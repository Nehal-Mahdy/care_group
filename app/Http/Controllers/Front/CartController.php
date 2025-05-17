<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('front.pages.cart.index', compact('cart'));
    }
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        // Return JSON if AJAX
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart!',
                'cartCount' => count($cart),
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }
    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed!');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared!');
    }

    public function updateAjax(Request $request)
    {
        $id = $request->input('id');
        $action = $request->input('action');

        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return response()->json(['success' => false, 'message' => 'Item not found.']);
        }

        if ($action === 'increase') {
            $cart[$id]['quantity'] += 1;
        } elseif ($action === 'decrease' && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity'] -= 1;
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'quantity' => $cart[$id]['quantity']
        ]);
    }

}