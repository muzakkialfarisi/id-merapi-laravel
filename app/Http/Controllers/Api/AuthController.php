<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        return response()->json([
            'status' => false,
            'message' => 'validation error',
            'errors' => 1
        ], 401);
        // try {
        //     $validateUser = Validator::make($request->all(), 
        //     [
        //         'email' => 'required|email',
        //         'password' => 'required'
        //     ]);

        //     if($validateUser->fails()){
        //         return response()->json([
        //             'status' => false,
        //             'message' => 'validation error',
        //             'errors' => $validateUser->errors()
        //         ], 401);
        //     }

        //     if(!Auth::attempt($request->only(['email', 'password']))){
        //         return response()->json([
        //             'status' => false,
        //             'message' => 'Email & Password does not match with our record.',
        //         ], 401);
        //     }

        //     $user = User::where('email', $request->email)->first();

        //     return response()->json([
        //         'status' => true,
        //         'message' => 'User Logged In Successfully',
        //         'token' => $user->createToken("API TOKEN")->plainTextToken
        //     ], 200);

        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => $th->getMessage()
        //     ], 500);
        // }
    }

    public function register_process()
    {
    }
}
