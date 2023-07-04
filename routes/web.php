<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return inertia('Welcome');
});
Route::get('/login', function () {
    return inertia('Auth/Login');
})->name('login');
Route::post('/verify-user', [AuthController::class, 'login'])->name('verify-user');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin-dashboard', function () {
        return inertia('Admin/Dashboard');
    })->name('admin-dashboard');
    Route::get('/admin-table', function () {
        return inertia('Admin/Tabular');
    })->name('admin-table');
    Route::post('/testing-token', function () {
        return response()->json(['message' => 'Successfull']);
    });
});
