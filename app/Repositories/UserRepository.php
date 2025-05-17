<?php

namespace App\Repositories;

use App\Enum\Roles;
use App\Models\User;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function model()
    {
        return $this->model::class;
    }

    public function apiBuilder()
    {
        return QueryBuilder::for($this->model())
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::partial('name'),
                AllowedFilter::exact('email'),
            ])
            ->allowedSorts(['id', 'name', 'created_at', 'updated_at'])
            ->allowedIncludes(['roles']);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getAllWithRelations(array $relations)
    {
        return $this->model->whereNotIn('name', [Roles::ROLE_SUPER_ADMIN])->with($relations)->get();
    }


    public function getUsers($perPage)
    {

        return $this->apiBuilder()->whereNotIn('name', [Roles::ROLE_SUPER_ADMIN])->paginate($perPage);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }


    public function findWithRelations($id, array $relations = []): ?User
    {
        return $this->model->with($relations)->where('id', $id)->whereNotIn('name', [Roles::ROLE_SUPER_ADMIN])->first();
    }

    public function create(array $data): User
    {

        $data['password'] = bcrypt($data['password']);
        $data['user_id'] = auth()->user()->id;
        // Create the service
        $user = $this->model->create($data);
        $user->assignRole($data['roles']);
        // Handle image upload if provided
        if (isset($data['image_path']) && !empty($data['image_path'])) {
            uploadImage($user, $data['image_path']);
        }

        return $user;
    }

    public function update(array $data, User $user): User
    {

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        if(isset($data['roles'])){
            $user->syncRoles($data['roles']);
        }
        if (isset($data['image_path']) && !empty($data['image_path'])) {
            updateImage($user, $data['image_path']);
        }

        return $user;
    }

    public function delete(User $user): void
    {

        if (!$user) {
            toastr()->error('User not found.');
        }
        if ($user->hasMedia()) {
            $user->clearMediaCollection();
        }

        $user->delete();
    }
}
