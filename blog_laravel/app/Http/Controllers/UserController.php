<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;



class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|min:2",
            "surname" => "required|string|min:2",
            "email" => "required|string|email",
            "password" => "required|string|min:6"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "error" => [
                    "errors" => $validator->errors()
                ]
            ]);
        } else {
            $token = bin2hex(openssl_random_pseudo_bytes(16));
            $add = new User();
            $add->name = $request->input('name');
            $add->surname = $request->input('surname');
            $add->email = $request->input('email');
            $add->password = $request->input('password');
            $add->token = $token;
            $add->save();
            return response()->json([
                "Профиль создан"
            ]);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|string|email",
            "password" => "required|string|min:6"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "error" => [
                    "errors" => $validator->errors()
                ]
            ]);
        } else {
            $user = User::where('email', $request->input('email'))->first();
            if ($user != null) {
                if ($user->password == $request->input('password')) {
                    $token = bin2hex(openssl_random_pseudo_bytes(16));
                    $user->token = $token;
                    $user-> save();
                    return response()->json(["data" =>
                    [
                        "token" => $token
                    ]]);
                }
            }
        }
    }
}
