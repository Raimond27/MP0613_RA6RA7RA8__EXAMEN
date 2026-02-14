<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPizzaController;
use App\Http\Controllers\Admin\AdminOrderController;

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

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/pizzas', 'index')->name('order.index')->middleware('auth');
    Route::get('/orders/pizzas/create', 'create')->name('order.create')->middleware('auth');
    Route::post('/orders/pizzas', 'store')->name('order.store')->middleware('auth');
    Route::get('/orders/pizzas/{id}', 'show')->name('order.show')->middleware('auth');
    Route::delete('/orders/pizzas/{id}', 'destroy')->name('order.destroy')->middleware('auth');
});

Route::controller(PizzaController::class)->group(function () {
    Route::get('/pizzas', 'index')->name('pizzas.index');
    Route::get('/pizzas/{id}', 'show')->name('pizzas.show');
});

// Admin Routes
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::controller(AdminPizzaController::class)->group(function () {
        Route::get('/pizzas', 'index')->name('admin.pizzas.index');
        Route::get('/pizzas/create', 'create')->name('admin.pizzas.create');
        Route::post('/pizzas', 'store')->name('admin.pizzas.store');
        Route::get('/pizzas/{id}', 'show')->name('admin.pizzas.show');
        Route::get('/pizzas/{id}/edit', 'edit')->name('admin.pizzas.edit');
        Route::put('/pizzas/{id}', 'update')->name('admin.pizzas.update');
        Route::delete('/pizzas/{id}', 'destroy')->name('admin.pizzas.destroy');
    });
    
    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/orders', 'index')->name('admin.orders.index');
        Route::get('/orders/{id}', 'show')->name('admin.orders.show');
        Route::delete('/orders/{id}', 'destroy')->name('admin.orders.destroy');
    });
});

$blackList = [
    'register' => false
];
Auth::routes($blackList);

Route::get('/home', [HomeController::class, 'index'])->name('home');
