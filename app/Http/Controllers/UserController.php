<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   public function index(Request $request)
   {
      // $users = User::paginate(10);
      $users = DB::table('users')
         ->when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
         })->orderBy('id', 'desc')
         ->paginate(10);
      return view('pages.users.index', compact('users'));
   }
}
