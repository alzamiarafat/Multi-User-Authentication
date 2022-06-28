<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home')->middleware('admin');

});

Route::group(['prefix' => 'manager', 'middleware' => ['manager']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('manager.home')->middleware('manager');

});

Route::group(['prefix' => 'customer', 'middleware' => ['customer']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('customer.home')->middleware('customer');

});
