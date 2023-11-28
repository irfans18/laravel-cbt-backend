<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function register(Request $request)
   {
      $validatedData = $request->validate([
         'name' => 'required|max:55',
         'email' => 'required|email|unique:users',
         'password' => 'required|confirmed',
      ]);

      $user = User::create([
         'name' => $validatedData['name'],
         'email' => $validatedData['email'],
         'password' => Hash::make($validatedData['password']),
         'roles' => 'USER',
      ]);

      $token = $user->createToken('auth_token')->plainTextToken;
      return response()->json([
         'access_token' => $token,
         'user' => UserResource::make($user),
      ]);
   }

   public function login(Request $request)
   {
      $validatedData = $request->validate([
         'email' => 'required|email',
         'password' => 'required',
      ]);

      $user = User::where('email', $validatedData['email'])->first();
      if (!$user) {
         return response()->json(['message' => 'User not found'], 401);
      }
      if (!Hash::check($validatedData['password'], $user->password)) {
         return response()->json(['message' => 'Invalid credentials'], 401);
      }

      $token = $user->createToken('auth_token')->plainTextToken;
      return response()->json([
         'access_token' => $token,
         'user' => UserResource::make($user),
      ]);
   }

   public function logout(Request $request)
   {
      $request->user()->currentAccessToken()->delete();

      return response()->json(['message' => 'Logout success']);
   }
}
