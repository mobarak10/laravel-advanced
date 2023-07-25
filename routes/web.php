<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PayOrderController;
use App\PostCardSendingService;
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
    return view('welcome');
});

Route::get('pay', [PayOrderController::class, 'store']);

Route::get('/postcards', function () {
    $postcardService = new PostCardSendingService('us', 4, 6);

    $postcardService->hello('Hello from Utkorsho IT', 'test@test.com');
});

Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/show/{id}', [CustomerController::class, 'show']);
Route::get('/customer/{id}/update', [CustomerController::class, 'update']);
Route::get('/customer/{id}/destroy', [CustomerController::class, 'destroy']);
