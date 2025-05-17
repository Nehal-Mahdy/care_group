<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerPasswordMail;
use App\Repositories\orders\OrderRepository;

class CheckoutController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    // Show the checkout form for given product ID
    public function show(Request $request)
    {
        $cart = session()->get('cart', []);
        $countries = Country::all();

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('front.pages.products.checkout', compact('cart', 'countries'));
    }




    public function placeOrder(StoreOrderRequest $request, OrderRepository $orderRepository)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validated();

        // Calculate total
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // Prepare data for order creation
        $orderData = array_merge($validated, [
            'total_price' => $total,
            'products' => $cart, // for attach
        ]);

        // Create order via repository
        $order = $orderRepository->create($orderData);

        // Clear cart
        session()->forget('cart');

        return redirect()->route('checkout.thankyou', $order->id)->with('message', 'Order placed successfully!');
    }



    // Thank you page after order placement
    public function thankYou($orderId)
    {
        $order = Order::with('products')->findOrFail($orderId);
        return view('front.pages.products.thankyou', compact('order'));
    }
}
