<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Repositories\Products\ProductRepository;
use Illuminate\View\View;

class HomePageController extends Controller
{

    protected $productRepository;
    public function __construct(

        ProductRepository $productRepository
    ) {

        $this->productRepository = $productRepository;

    }

    /**
     * Show the application home page.
     */
    public function index(): View
    {
        $products = $this->productRepository->getProducts(10);
        $cart = session('cart', []);
        $cartProductIds = array_keys($cart);

        return view('front.sections.home', compact('products', 'cartProductIds'));
    }
}
