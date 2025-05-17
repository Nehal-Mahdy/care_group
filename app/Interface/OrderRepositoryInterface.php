<?php

namespace App\Interface;

use App\Models\Order;

interface OrderRepositoryInterface
{
    public function model();

    public function apiBuilder();

    public function getAll();

    public function all();

    public function getOrders($perPage);

    public function findById($id);

    public function findWithRelations($id, array $relations = []): ?Order;

    public function create(array $data): Order;

    public function delete(Order $order): bool;
}
