<?php

namespace App\Repositories\orders;

use App\Enum\Roles;
use App\Models\Order;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Interface\OrderRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class OrderRepository implements OrderRepositoryInterface
{
    protected $model;

    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function model()
    {
        return $this->model::class;
    }

    public function apiBuilder()
    {
        return QueryBuilder::for(Order::class)
            ->allowedFilters([
                AllowedFilter::exact('paid'),
                AllowedFilter::exact('cancelled'),
            ])
            ->allowedSorts(['id', 'order_number', 'created_at', 'updated_at'])
            ->orderBy('id', 'desc');

    }
    public function getAll()
    {
        return $this->model->all();
    }


    public function all()
    {
        return $this->apiBuilder()->get();
    }

    public function getOrders($perPage)
    {
        $orders = $this->apiBuilder()->orderBy('id', 'desc')->get();


    }

    public function findById($id)
    {
        return $this->model->find($id);
    }


    public function findWithRelations($id, array $relations = []): ?Order
    {
        return $this->model->with($relations)->where('id', $id)->first();
    }


    public function create(array $data): Order
    {
        // Generate order number if not set
        if (empty($data['order_number'])) {
            $data['order_number'] = strtoupper(\Str::random(10));
        }

        // Default status if not set
        if (empty($data['status'])) {
            $data['status'] = 'pending';
        }

        // Create and save the order
        $order = new Order();
        $order->fill($data);
        $order->save();

        // Attach products if provided
        if (!empty($data['products']) && is_array($data['products'])) {
            foreach ($data['products'] as $productId => $item) {
                $order->products()->attach($productId, [
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['price'] * $item['quantity'],
                ]);
            }
        }

        return $order;
    }



    public function delete($order): bool
    {
        return $order->delete();
    }


}
