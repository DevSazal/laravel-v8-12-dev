<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// To Make Authenticate User
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
        public function index(Request $request)
        {
            $user= User::where('email', $request->email)->first();
            // print_r($data);

                if (!$user || !Hash::check($request->password, $user->password)) {
                    return response([
                        'message' => ['These credentials do not match our records.']
                    ], 404);
                }

                 $token = $user->createToken('my-app-token')->plainTextToken;

                $response = [
                    'user' => $user,
                    'token' => $token
                ];

                 return response($response, 201);
        }
}
