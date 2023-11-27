<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/ho', function () {
//     return view('pages.dashboard')->name('home');
// });

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function(){
   Route::get('home', function () {
       return view('pages.dashboard');
   })->name('home');
   Route::resource('user', UserController::class);
   Route::resource('question', QuestionController::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });
