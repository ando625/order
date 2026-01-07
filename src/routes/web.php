<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;

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



Route::get('/',[OrderController::class, 'index'])->name('menus.index');
Route::get('/cart',[OrderController::class, 'cart']);
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/api/menus', [OrderController::class, 'apiMenus']);


Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/index', [AdminOrderController::class, 'index'])->name('index');  //URLは/admin/index

        Route::post('/orders/{order}/handed', [AdminOrderController::class, 'handed'])->name('orders.handed');
});