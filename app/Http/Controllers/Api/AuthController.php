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

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      //
   }
}
