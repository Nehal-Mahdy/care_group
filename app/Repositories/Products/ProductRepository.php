<?php

namespace App\Repositories\Products;

use App\Interface\ProductRepositoryInterface;
use App\Models\Product;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function model()
    {
        return $this->model::class;
    }

    public function apiBuilder()
    {
        return QueryBuilder::for($this->model())
            ->allowedFilters([
                AllowedFilter::exact('category.slug'),
            ])
            ->allowedSorts(['id', 'title', 'created_at', 'updated_at'])
            ->allowedIncludes(['category']);
    }

    public function getAll()
    {
        return $this->model->all();
    }
    public function all()
    {

        return $this->apiBuilder()->get();
    }
    public function getAllWithRelations(array $relations)
    {
        return $this->model->with($relations)->get();
    }


    public function getProducts($perPage)
    {
        return $this->apiBuilder()->paginate($perPage);
    }

    public function getProductById($id)
    {
        return $this->model->find($id);
    }


    public function getProductWithRelations($id, array $relations = []): ?Product
    {
        return $this->model->with($relations)->where('id', $id)->first();
    }

    public function create(array $data): Product
    {

        // Generate a base slug
        $slug = \Str::slug($data['name']);
        $originalSlug = $slug;
        $count = 1;

        // Ensure the slug is unique
        while ($this->model->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        // Create the service
        $product = $this->model->create($data);

        // Handle image upload if provided
        if (isset($data['image']) && !empty($data['image'])) {
            uploadImage($product, $data['image']);
        }


        return $product;
    }

    public function update(array $data, Product $product): Product
    {
        $slug = $data['slug'];
        $originalSlug = $slug;
        $count = 1;

        while ($this->model->where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        $product->update($data);
        if (isset($data['image']) && !empty($data['image'])) {
            updateImage($product, $data['image']);
        }


        return $product;
    }


    public function delete(Product $product): void
    {
        if (!$product) {
            toastr()->error('Product not found.');
            return;
        }


        $product->orders()->delete();





        if ($product->hasMedia()) {
            $product->clearMediaCollection();
        }


        $product->delete();
    }



    public function findBySlug($slug): ?Product
    {
        return $this->model->where('slug', $slug)->first();
    }





}

