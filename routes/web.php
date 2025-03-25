<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/procurement/requests', function () {
        return view('procurement.requests');
    })->name('procurement.requests');
    

    //Master Data
    

    //Master Data - Products
    Route::get('/masterdata/items', function () {
        return view('masterdata.product');
    })->name('masterdata.product');
    Route::prefix('master-data')->controller(ProductController::class)->group(function () {
        Route::post('/save-product', 'saveProduct')->name('product.save');
        Route::get('/get-products', [ProductController::class,'getProducts'])->name('product.getAll');
        
    });

    //Master Data - Supplier
    Route::get('/masterdata/suppliers', function () {
        return view('masterdata.supplier');
    })->name('masterdata.suppliers');

    Route::prefix('master-data')->controller(SupplierController::class)->group(function () {
        Route::post('/save-supplier','saveSupplier')->name('supplier.save');
    });

    //Procument - Purchase order
    Route::get('/procument/purchaseOrders', function () {
        return view('procument.purchaseOrder');
    })->name('procument.purchaseorders');
    Route::get('/get-item-by-barcode/{barcode}', [ProductController::class, 'getItemByBarcode']); // will be used to all PO / GRN /Return / Invoices
    Route::get('/get-item-by-item-id/{product_code}', [ProductController::class, 'getItemByProductId']); // will be used to all PO / GRN /Return / Invoices
    Route::get('/get-item-to-popup-search', [ProductController::class,'getItemToPopupSearch']);

});

require __DIR__.'/auth.php';
