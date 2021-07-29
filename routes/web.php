<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderSaleController;
use App\Http\Controllers\OrderServiceController;
use App\Http\Controllers\OrderSiteController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceSiteController;
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
    Route::post('service/client/{slug}/orderSale-Created', [OrderSaleController::class, 'store'])->name('orderSale.store');
    Route::get('Order-sale/edit/{folio}', [OrderSaleController::class, 'edit'])->name('orderSale.edit');
    Route::delete('delete-saleOrder/{slug}', [OrderSaleController::class, 'destroy'])->name('orderSale.destroy');
    // Route::get('table-orders-sale/{folio}', [OrderSaleController::class, 'show'])->name('orderSaele.show');

    //Rutas de productos
    Route::get('table-orders-sale/{folio}', [ProductController::class, 'index'])->name('products.index');
    Route::post('order-sale/{folio}/product/save', [ProductController::class, 'store'])->name('products.store');
    Route::get('order-sale/{folio}/product/{slug}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('product/{slug}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('product/{slug}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

    //Rutas de ordenes de servicio
    Route::get('table-orders-services', [OrderServiceController::class, 'index'])->name('orderService.index');
    Route::get('order-service/create/{slug}', [OrderServiceController::class, 'create'])->name('orderService.create');
    Route::post('order-service/create/{slug}', [OrderServiceController::class, 'store'])->name('orderService.store');
    Route::get('order-service/{folio}', [OrderServiceController::class, 'show'])->name('orderService.show');
    Route::post('order-service/{folio}/equipment/{id}/services-create', [OrderServiceController::class, 'storeEquipment'])->name('orderService.storeEquipment');
    Route::get('order-service/edit/{folio}', [OrderServiceController::class, 'edit'])->name('orderService.edit');
    Route::put('order-service/update/{folio}', [OrderServiceController::class, 'update'])->name('orderService.update');
    Route::put('order-service/{folio}/equipment/{id}/update', [OrderServiceController::class, 'updateEquipment'])->name('orderService.updateEquipment');
    Route::delete('order-service/{slug}/delete', [OrderServiceController::class, 'destroy'])->name('orderService.destroy');

    //Rutas de ordenes de servicio en sitio
    Route::get('table-orders-services-on-site', [OrderSiteController::class, 'index'])->name('orderSite.index');
    Route::get('order-service-on-site/create/{slug}', [OrderSiteController::class, 'create'])->name('orderSite.create');
    Route::post('order-service-on-site/create/{slug}', [OrderSiteController::class, 'store'])->name('orderSite.store');
    Route::get('table-orders-service-on-site/{folio}', [OrderSiteController::class, 'show'])->name('orderSite.show');
    Route::get('Order-service-in-site/edit/{folio}', [OrderSiteController::class, 'edit'])->name('orderSite.edit');

    // Rutas de servicios (ordenes en sitio)
    Route::post('order-service-site/{folio}/service/save', [ServiceSiteController::class, 'store'])->name('serviceSite.store');
    Route::get('order-service-site/{folio}/service/{slug}/edit', [ServiceSiteController::class, 'edit'])->name('serviceSite.edit');

    // Ruta de pdf
    Route::get('pdf/{folio}', [PdfController::class, 'pdfOrder'])->name('pdf.show');
    Route::get('pdfService/{folio}', [PdfController::class, 'pdfService'])->name('pdfService.show');

});
