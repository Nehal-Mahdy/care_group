<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginPatientRequest;
use App\Http\Requests\LoginProvidertRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterProvidertRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\PatientResource;
use App\Http\Resources\ProviderResource;
use App\Http\Resources\UserResource;
use App\Models\Patient;
use App\Models\Provider;
use App\Models\User;
use App\Models\UserSubscription;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request)
    {

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->error('', __('messages.userLoginCredentialsError'), 400);
        }
        $user = User::where('email', $request->email)->first();

        //check user not has role user
        // check user freeze
        if ($user->freeze) {
            return $this->error('', __('messages.userFreeze'), 400);
        }

        return $this->success([
            'user' => UserResource::make($user),
            'token' => $user->createToken("API Token Of " . $user->name)->plainTextToken,
        ], __('messages.userLoginSuccess'));
    }
    public function changePassword(ChangePasswordRequest $changePassword)
    {
        $data = $changePassword->validated();
        $user = auth()->user();
        if (!Hash::check($data['old_password'], $user->password)) {
            return $this->error($user, __('messages.userCurrentPasswordNotMatch'), 400);
        }
        $user->update(['password' => Hash::make($data['password'])]);
        return $this->success($user, __('messages.userChangedPassword'));
    }


    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => __('messages.userLogoutSuccess'),
        ]);
    }
}
