<?php

namespace App\Interface;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getAll();
    public function getAllWithRelations(array $relations);
    public function getUsers($perPage);
    public function findWithRelations($id, array $relations = []): ?User;
    public function create(array $data): User;
    public function update(array $data, User $user): User;
    public function delete(User $user): void;
}