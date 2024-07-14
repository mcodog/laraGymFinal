<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use App\Models\Account;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clients', ClientController::class);
Route::apiResource('coach', CoachController::class);
Route::apiResource('program', ProgramController::class);
Route::apiResource('membership', MembershipController::class);
Route::apiResource('account', AccountController::class);


Route::post('/check', [UserController::class, 'check']);
Route::post('/transact', [TransactionController::class, 'saveProgram']);
Route::post('/getPrograms/{id}', [TransactionController::class, 'retrievePrograms']);
Route::get('/home', [UserController::class, 'login']);
Route::get('/profile', [AccountController::class, 'getDetails']);

Route::get('/search/{query}', [ProgramController::class, 'search']);
Route::get('/sales', [TransactionController::class, 'salesChart']);
Route::get('/applicants', [TransactionController::class, 'countApplicant']);
Route::get('/members', [TransactionController::class, 'getMemberships']);

