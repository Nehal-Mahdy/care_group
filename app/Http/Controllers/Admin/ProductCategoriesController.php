<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Permissions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\Categories\StoreProductCategoryRequest;
use App\Http\Requests\Products\Categories\UpdateProductCategoryRequest;
use App\Repositories\Products\ProductCategoryRepository;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    protected $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(Permissions::PRODUCT_CATEGORIES_LIST);
        $categories = $this->productCategoryRepository->all();
        return view('products.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize(Permissions::PRODUCT_CATEGORIES_CREATE);
        return view('products.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $this->authorize(Permissions::PRODUCT_CATEGORIES_CREATE);
        $data = $request->validated();
        $this->productCategoryRepository->create($data);
        return redirect()->route('productCategories.index')->with('success', 'Product Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize(Permissions::PRODUCT_CATEGORIES_LIST);
        $category = $this->productCategoryRepository->find($id);
        return view('products.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize(Permissions::PRODUCT_CATEGORIES_UPDATE);
        $category = $this->productCategoryRepository->find($id);
        return view('products.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, string $id)
    {
        $this->authorize(Permissions::PRODUCT_CATEGORIES_UPDATE);
        $data = $request->validated();
        $category = $this->productCategoryRepository->find($id);
        $this->productCategoryRepository->update($data, $category);
        return redirect()->route('productCategories.index')->with('success', 'Product Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize(Permissions::PRODUCT_CATEGORIES_DELETE);
        $this->productCategoryRepository->delete($id);
        return redirect()->route('productCategories.index')->with('success', 'Product Category deleted successfully');
    }
}
