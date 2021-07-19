<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderSaleController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest')->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('service/{slug}', ServiceController::class)->name('services.index');

    //Rutas de clientes
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('create-client', [ClientController::class, 'create'])->name('clients.create');
    Route::post('create-client', [ClientController::class, 'store'])->name('clients.store');
    Route::get('edit-client/{slug}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('update-client/{slug}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('delete-client/{slug}', [ClientController::class, 'destroy'])->name('clients.destroy');

    //Rutas de ordenes de venta

    Route::get('table-orders-sale', [OrderSaleController::class, 'index'])->name('orders.index');
    Route::get('service/client/{slug}/OrderSale-create', [OrderSaleController::class, 'create'])->name('orderSale.create');
    Route::post('service/client/{slug}/orderSale-Created', [OrderSaleController::class, 'store'])->name('orderSaele.store');

});