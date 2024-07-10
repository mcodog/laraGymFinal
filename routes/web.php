<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('/people', 'admin.people.index');
Route::view('/session', 'admin.session.index');

Route::view('/login', 'auth.login')->name('login');

Route::view('/membership', 'client.membership')->name('membership');
Route::get('/profile/{id}', [AccountController::class, 'display'])->name('profile');