<?php

namespace App\Repositories\Products;

use App\Interface\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Log;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface
{
    protected $model;

    public function __construct(ProductCategory $model)
    {
        $this->model = $model;
    }

    public function model()
    {
        return $this->model::class;
    }


    public function apiBuilder()
    {
        return QueryBuilder::for($this->model())
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('name'),
                AllowedFilter::exact('slug'),
            ])
            ->allowedSorts(['id', 'name', 'created_at', 'updated_at']);
    }

    /**
     * Retrieve all categorys.
     */
    public function all()
    {
        return $this->apiBuilder()->get();
    }

    /**
     * Retrieve categories with optional filters, search, and pagination.
     */
    public function getCategories($perPage)
    {
        return $this->apiBuilder()->paginate($perPage);
    }


    public function find($id)
    {

        return ProductCategory::find($id);
    }
    /**
     * Retrieve a single category by slug.
     */
    public function findBySlug(string $slug): ?ProductCategory
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Retrieve a category by ID with specified relations.
     */
    public function findWithRelations($id, array $relations = []): ?ProductCategory
    {
        return $this->model->with($relations)->where('id', $id)->first();
    }

    /**
     * Create a new category.
     */
    public function create(array $data): ProductCategory
    {
        $slug = \Str::slug($data['name']);
        $originalSlug = $slug;
        $count = 1;

        while ($this->model->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        return $this->model->create($data);
    }

    /**
     * Update an existing category.
     */
    public function update(array $data, $category): ProductCategory
    {
        $slug = $data['slug'];
        $originalSlug = $slug;
        $count = 1;

        // Ensure slug uniqueness, ignoring the current category
        while ($this->model->where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        $category->update($data);

        return $category;
    }



    /**
     * Delete a Product Category.
     */
    public function delete($id): void
    {
        $category = $this->model->find($id);
        $category->delete();
    }
}
