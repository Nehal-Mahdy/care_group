<?php
namespace App\Http\Controllers\Admin;

use App\Enum\Permissions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\ProductCategory;
use App\Models\Trainer;
use App\Repositories\Products\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize(Permissions::PRODUCTS_LIST);

        $products = $this->productRepository->all();
        $categories = ProductCategory::all();
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize(Permissions::PRODUCTS_CREATE);
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize(Permissions::PRODUCTS_CREATE);
        $data = $request->validated();
        $this->productRepository->create($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize(Permissions::PRODUCTS_SHOW);
        $product = $this->productRepository->getProductById($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize(Permissions::PRODUCTS_UPDATE);
        $product = $this->productRepository->getProductById($id);
        $categories = ProductCategory::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $this->authorize(Permissions::PRODUCTS_UPDATE);
        $data = $request->validated();
        $product = $this->productRepository->getProductById($id);
        $this->productRepository->update($data, $product);
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize(Permissions::PRODUCTS_DELETE);
        $product = $this->productRepository->getProductById($id);
        $this->productRepository->delete($product);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
