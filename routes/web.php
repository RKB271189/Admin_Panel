<?php

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

Route::post('/verify-user', function () {
    return response()->json(['message' => "login successfull"]);
})->name('verify-user');
Route::get('/admin-dashboard', function () {
    return inertia('Admin/Dashboard');
})->name('admin-dashboard');
