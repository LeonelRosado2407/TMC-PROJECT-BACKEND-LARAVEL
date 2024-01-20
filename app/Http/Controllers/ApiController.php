<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller 
{
    use Authenticatable;



    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json([
                'status' => 'success',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $user->save();

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }
}
