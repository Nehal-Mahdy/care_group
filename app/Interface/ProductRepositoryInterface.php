<?php

namespace App\Interface;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function getAll();
    public function getAllWithRelations(array $relations);
    public function getProducts($perPage);
    public function getProductById($id);
    public function create(array $data);
    public function update(array $data, Product $product);
    public function delete(Product $product);
}
