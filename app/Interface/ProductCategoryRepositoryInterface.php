<?php

namespace App\Interface;

interface ProductCategoryRepositoryInterface
{
    public function all();
    public function getCategories($perPage);
    public function create(array $data);
    public function update(array $data, $category);
    public function delete($category);
    public function findBySlug(string $slug);
    public function findWithRelations($id, array $relations = []);
    public function apiBuilder();
}
