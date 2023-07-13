<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TabularController;
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
    return inertia('Auth/Login');
});
Route::get('/login', function () {
    return inertia('Auth/Login');
})->name('login');
Route::post('/verify-user', [AuthController::class, 'login'])->name('verify-user');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin-dashboard', function () {
        return inertia('Admin/Dashboard');
    })->name('admin-dashboard');
    Route::get('/admin-table', [TabularController::class, 'index'])->name('admin-table');
    Route::get('/admin-form', function () {
        return inertia('Admin/Form');
    })->name('admin-form');
    Route::get('/get-table-details', [TabularController::class, 'getTableDetails'])->name('get-table-details');
    Route::post('/save-form-details', [FormController::class, 'saveFormDetails'])->name('save-form-details');
    Route::get('/admin-gallery', [GalleryController::class, 'index'])->name('admin-gallery');
    Route::post('/testing-token', function () {
        return response()->json(['message' => 'Successfull']);
    });
});
