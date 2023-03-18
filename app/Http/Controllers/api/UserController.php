<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function Symfony\Component\String\b;

class UserController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);

        $user = User::create($request->toArray());
        return apiResponse($user, 'Register Successfully', true, 200);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return apiResponse($user, 'Login Successfully', true, 200);

            } else {
                return apiResponse(null, 'Password mismatch', false, 422);

            }
        } else {
            return apiResponse(null, 'User does not exist', false, 422);
        }

    }

    public function forget()
    {

        $email = request()->validate(['email' => 'required|email']);
        Password::sendResetLink($email);
                return apiResponse(null, 'Reset Password Link sent on your email', true, 422);



    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }


}
