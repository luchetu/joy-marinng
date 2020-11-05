<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('api.admins')->except('logout', 'checkAuth');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',

        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = Admin::create($request->toArray());
        $token = $user->createToken('Admin Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $user = Admin::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Admin Password Grant Client')->accessToken;
                $user->api_token = $token;
                return response()->json([
                    'user' => $user->toArray(),
                ]);
            } else {
                $response = ["message" => $request->password];
                return response($response, 422);
            }
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
            return response()->json(['data' => 'User logged out.'], 200);

    }
    public function checkAuth(Request $request)
    {
        $user = Auth::guard('admin-api')->user();

        if ($user) {
            return response()->json(['state' => 1], 200);
        }
        return response()->json($user);
    }
}
