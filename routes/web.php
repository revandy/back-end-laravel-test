<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginCheck'])->name('login-check');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerProcess'])->name('register-process');
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('prepaid-balance', [HomeController::class, 'prepaidBalance'])->name('prepaid-balance');
    Route::get('product', [HomeController::class, 'product'])->name('product');
    Route::post('payment', [HomeController::class, 'payment'])->name('payment');
    Route::post('payment/finish', [HomeController::class, 'paymentFinish'])->name('payment-finish');
    Route::post('transaction', [HomeController::class, 'transaction'])->name('transaction');
    Route::get('history', [HomeController::class, 'history'])->name('history');
    Route::post('history', [HomeController::class, 'payNow'])->name('pay-now');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout'); 
});
