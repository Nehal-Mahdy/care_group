<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Permissions;
use App\Enum\Roles;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Repositories\UserRepository;
use Spatie\Permission\Models\Role;



class UsersController extends Controller
{


    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize(Permissions::USERS_LIST, User::class);
        $users = $this->userRepository->getAllWithRelations(['roles']);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize(Permissions::USERS_CREATE, User::class);

        $roles = Role::whereNotIn('name', [Roles::ROLE_SUPER_ADMIN])->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $this->authorize(Permissions::USERS_CREATE, User::class);
        $data = $request->validated();
        $this->userRepository->create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $this->authorize(Permissions::USERS_SHOW, User::class);
        if (Auth::user()->hasRole(Roles::ROLE_SUPER_ADMIN)) {
            return view('users/show', compact('user'));
        } else {
            if (Auth::user()->id == $user->id) {
                return view('users/show', compact('user'));
            } else {
                abort('403', 'Access Denied');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize(Permissions::USERS_UPDATE, User::class);


        $roles = Role::whereNotIn('name', [Roles::ROLE_SUPER_ADMIN])->get();
        $user = $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        $this->authorize(Permissions::USERS_UPDATE, User::class);
        $data = $request->validated();
        $this->userRepository->update($data, $user);


        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize(Permissions::USERS_DELETE, User::class);
        $this->userRepository->delete($user);
        return back();
    }
}
