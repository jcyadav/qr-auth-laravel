<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [RegisterController::class, 'Index'])->name('Index');

Route::get('/download-qr/{format}', [RegisterController::class, 'downloadQR'])->name('download.qr');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');