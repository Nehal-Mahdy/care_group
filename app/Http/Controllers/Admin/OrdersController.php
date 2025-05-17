<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Repositories\orders\OrderRepository;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{

    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderRepository->findById($id);
        return view('orders.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = $this->orderRepository->findById($id);

        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Order not found.');
        }

        $this->orderRepository->delete($order);

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }


}
