<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\Products\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function index(Request $request): View
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });

        }

        $products = $query->with('category')->paginate(6);
        $cart = session()->get('cart', []);


        $allProducts = Product::all();
        $categories = ProductCategory::withCount('products')->get();

        return view('front.pages.products.index', compact('products', 'cart', 'allProducts', 'categories'));
    }


    public function show($slug)
    {
        $product = $this->productRepository->findBySlug($slug);

        if (!$product) {
            abort(404, 'Product not found');
        }

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->limit(3)
            ->get();

        $cart = session()->get('cart', []);

        // Extract product IDs from cart
        $cartProductIds = array_keys($cart);

        return view('front.pages.products.show', compact('product', 'relatedProducts', 'cart', 'cartProductIds'));
    }



    public function search(Request $request)
    {
        $query = $request->query('query');  // safer to get from query parameters

        if (empty($query)) {
            return response()->json([]);
        }

        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->with('category')  // eager load category relation
            ->get()
            ->map(function ($product) {
                $product->image = $product->image ? asset('storage/' . $product->image) : asset('image/default.png');
                $product->category_name = $product->category->name ?? 'Uncategorized'; // safely access
                return $product;
            });

        // Map image URLs for front-end consumption
        $products->transform(function ($product) {
            $product->image = $product->image ? asset('storage/' . $product->image) : asset('image/default.png');
            return $product;
        });

        return response()->json($products);
    }



}
