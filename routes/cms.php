<?php

/*
|--------------------------------------------------------------------------
| Cms Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Cms')->group(function () {
    Route::group(['middleware' => 'check-login'], function () {
        Route::get('/login', 'AuthController@login')->name('page-login');
        Route::post('/sign-in', 'AuthController@signIn');
        Route::get('/forgot-password', 'AuthController@forgotPassword')->name('page-forgot-password');
        Route::post('/get-verify-code', 'AuthController@getVerifyCode')->name('getVerifyCode');
        Route::get('/reset-password', 'AuthController@resetPassword')->name('page-reset-password');
        Route::post('/change-password-new', 'AuthController@changePasswordNew')->name('changepwdNew');
    });

    Route::prefix('admin')->middleware(['locale', 'check-logout', 'auto-logout'])->group(function () {
        Route::get('change-language/{language}', 'AdminController@changeLanguage')->name('user.change-language');
        Route::get('/', 'AdminController@index')->name('page-admin');
        Route::get('/', 'DashboardController@index')->name('home.index');
        Route::get('/logout', 'AuthController@logout')->name('logout');
        Route::get('/profile', 'AuthController@account')->name('profile');
        Route::get('/profile/{user}/edit', 'AuthController@profile')->name('profile.edit');
        Route::patch('/profile/{user}', 'AuthController@updateProfile')->name('profile.update');
        Route::patch('/change-password/{user}', 'AuthController@changePassword')->name('user.changePassword');

        Route::prefix('pos')->group(function () {
            Route::get('/', 'PosController@index')->middleware('permission:0,1,4')->name('pos.index');
            Route::get('/search/products', 'PosController@searchProductOnPos')->middleware('permission:0,1,4')->name('pos.searchProductOnPos');
            Route::get('/search/customers', 'PosController@searchCustomerOnPos')->middleware('permission:0,1,4')->name('pos.searchCustomerOnPos');
            Route::get('/buy/{id}/products', 'PosController@buyProductOnPos')->middleware('permission:0,1,4')->name('pos.buyProductOnPos');
        });

        Route::prefix('group-products')->group(function () {
            Route::get('/', 'ProductGroupController@index')->middleware('permission:0,1,2')->name('group-products.index');
            Route::post('/', 'ProductGroupController@store')->middleware('permission:0,1,2')->name('group-products.store');
            Route::get('/{id}/edit', 'ProductGroupController@edit')->middleware('permission:0,1,2')->name('group-products.edit');
            Route::patch('/{id}', 'ProductGroupController@update')->middleware('permission:0,1,2')->name('group-products.update');
            Route::delete('/{id}', 'ProductGroupController@destroy')->middleware('permission:0,1,2')->name('group-products.destroy');
        });

        Route::prefix('manufactures')->group(function () {
            Route::get('/', 'ManufactureController@index')->middleware('permission:0,1,2')->name('manufactures.index');
            Route::post('/', 'ManufactureController@store')->middleware('permission:0,1,2')->name('manufactures.store');
            Route::get('/{id}/edit', 'ManufactureController@edit')->middleware('permission:0,1,2')->name('manufactures.edit');
            Route::patch('/{id}', 'ManufactureController@update')->middleware('permission:0,1,2')->name('manufactures.update');
            Route::delete('/{id}', 'ManufactureController@destroy')->middleware('permission:0,1,2')->name('manufactures.destroy');
        });

        Route::prefix('products')->group(function () {
            Route::get('/', 'ProductController@index')->middleware('permission:0,1,2,3,4')->name('products.index');
            Route::get('/export', 'ProductController@export')->middleware('permission:0,1,2,3,4')->name('products.export');
            Route::get('/create', 'ProductController@create')->middleware('permission:0,1,2')->name('products.create');
            Route::post('/', 'ProductController@store')->middleware('permission:0,1,2')->name('products.store');
            Route::get('/{id}/edit', 'ProductController@edit')->middleware('permission:0,1,2')->name('products.edit');
            Route::get('/{id}/copy', 'ProductController@copy')->middleware('permission:0,1,2')->name('products.copy');
            Route::patch('/{id}', 'ProductController@update')->middleware('permission:0,1,2')->name('products.update');
            Route::delete('/{id}', 'ProductController@destroy')->middleware('permission:0,1,2')->name('products.destroy');
            Route::patch('/{id}/update-status', 'ProductController@updateStatus')->middleware('permission:0,1,2')->name('products.update-status');
            Route::get('/show-product-by-res', 'ProductController@showProductByRes')->middleware('permission:0,1,2,3,4')->name('products.show-product-by-res');
            Route::post('restore-product-soft-delete/{id}', 'ProductController@restoreSoftDeleteProduct')->middleware('permission:0,1,2')->name('products.restore-product-soft-delete');
            Route::get('/search', 'ProductController@searchProduct')->middleware('permission:0,1,2,3,4')->name('products.search');
            Route::get('/overs', 'ProductController@overProduct')->middleware('permission:0,1,2,3,4')->name('products.over');
            Route::get('/thresholds', 'ProductController@thresholdProduct')->middleware('permission:0,1,2,3,4')->name('products.threshold');
        });

        Route::prefix('orders')->group(function () {
            Route::get('/', 'OrderController@index')->middleware('permission:0,1,2,3,4')->name('orders.index');
            Route::post('/save-order', 'OrderController@saveOrder')->middleware('permission:0,1,4')->name('orders.save-order');
            Route::get('/print-order/{id}','OrderController@printOrder')->middleware('permission:0,1,4')->name('orders.print-order');
            Route::delete('/{id}', 'OrderController@destroy')->middleware('permission:0,1,4')->name('orders.destroy');
            Route::get('/search', 'OrderController@search')->middleware('permission:0,1,2,3,4')->name('orders.search');
            Route::get('/{id}/update-status', 'OrderController@updateStatusOrder')->middleware('permission:0,1,4')->name('orders.updateStatusOrder');
        });

        Route::prefix('customers')->group(function () {
            Route::get('/', 'CustomerController@index')->middleware('permission:0,1,2,3,4')->name('customers.index');
            Route::post('/', 'CustomerController@store')->middleware('permission:0,1,4')->name('customers.store');
            Route::get('/{id}/edit', 'CustomerController@edit')->middleware('permission:0,1,4')->name('customers.edit');
            Route::patch('/{id}', 'CustomerController@update')->middleware('permission:0,1,4')->name('customers.update');
            Route::delete('/{id}', 'CustomerController@destroy')->middleware('permission:0,1,4')->name('customers.destroy');
            Route::post('/send-notification', 'CustomerController@sendNotification')->middleware('permission:0,1,4')->name('customers.send-notification');
        });

        Route::prefix('suppliers')->group(function () {
            Route::get('/', 'SupplierController@index')->middleware('permission:0,1,2')->name('suppliers.index');
            Route::post('/create-suppliers', 'SupplierController@createSuppliers')->middleware('permission:0,1,2')->name('suppliers.store');
            Route::get('/{id}/edit', 'SupplierController@editSupplier')->middleware('permission:0,1,2')->name('suppliers.edit-supplier');
            Route::patch('/{id}', 'SupplierController@update')->middleware('permission:0,1,2')->name('suppliers.update');
            Route::delete('/{id}', 'SupplierController@delete')->middleware('permission:0,1,2')->name('suppliers.destroy');
        });

        Route::prefix('settings')->group(function () {
            Route::get('/', 'SettingController@index')->middleware('permission:0,1')->name('settings.index');
            Route::post('/create-users', 'SettingController@createUsers')->middleware('permission:0,1')->name('settings.create-users');
            Route::get('/{id}/edit', 'SettingController@editUser')->middleware('permission:0,1')->name('settings.edit-user');
            Route::patch('/{id}', 'SettingController@update')->middleware('permission:0,1')->name('settings.update');
            Route::delete('/{id}', 'SettingController@delete')->middleware('permission:0,1')->name('settings.destroy');

        });

        Route::prefix('profits')->group(function () {
            Route::get('/all', 'ProfitController@all')->middleware('permission:0,1,3')->name('profits.all');
            Route::get('/customer', 'ProfitController@customer')->middleware('permission:0,1,3')->name('profits.customer');
            Route::get('/product', 'ProfitController@product')->middleware('permission:0,1,3')->name('profits.product');
            Route::get('/sale', 'ProfitController@sale')->middleware('permission:0,1,3')->name('profits.sale');
        });

        Route::prefix('revenues')->group(function () {
            Route::get('/all', 'RevenueController@all')->middleware('permission:0,1,3')->name('revenues.all');
            Route::get('/customer', 'RevenueController@customer')->middleware('permission:0,1,3')->name('revenues.customer');
            Route::get('/product', 'RevenueController@product')->middleware('permission:0,1,3')->name('revenues.product');
            Route::get('/sale', 'RevenueController@sale')->middleware('permission:0,1,3')->name('revenues.sale');
        });

        Route::prefix('inventories')->group(function () {
            Route::get('/', 'InventoryController@index')->middleware('permission:0,1,2,3,4')->name('inventories.index');
        });

        Route::prefix('forms')->group(function () {
            Route::get('/search/products', 'FormController@searchProductOnForm')->middleware('permission:0,1,2')->name('forms.searchProductOnImport');
            Route::get('/search/suppliers', 'FormController@searchSupplierOnForm')->middleware('permission:0,1,2')->name('forms.searchCustomerOnImport');
            Route::get('/buy/{id}/products', 'FormController@buyProductOnForm')->middleware('permission:0,1,2')->name('forms.buyProductOnPos');
            Route::get('/purchase-orders', 'FormController@listPurchaseOrders')->middleware('permission:0,1,2,3')->name('forms.listPurchaseOrders');
            Route::get('/create-purchase-order', 'FormController@createPurchaseOrder')->middleware('permission:0,1,2')->name('forms.createPurchaseOrder');
            Route::post('/store-purchase-order', 'FormController@storePurchaseOrder')->middleware('permission:0,1,2')->name('forms.storePurchaseOrder');
            Route::get('/print-purchase-order/{id}', 'FormController@printPurchaseOrder')->middleware('permission:0,1,2,3')->name('forms.printPurchaseOrder');
            Route::delete('/{id}/purchase-order', 'FormController@destroyPurchaseOrder')->middleware('permission:0,1,2')->name('forms.destroyPurchaseOrder');
            Route::get('/search/purchase-order', 'FormController@searchPurchaseOrder')->middleware('permission:0,1,2,3')->name('forms.searchPurchaseOrder');
            Route::patch('/{id}/update-status-purchase-order', 'FormController@UpdateStatusPurchaseOrder')->middleware('permission:0,1,2')->name('forms.updateStatusPurchaseOrder');
            Route::get('/inputs', 'FormController@listInputs')->middleware('permission:0,1,2,3')->name('forms.listInputs');
            Route::get('/create-input', 'FormController@createInput')->middleware('permission:0,1,2')->name('forms.createInput');
            Route::post('/store-input', 'FormController@storeInput')->middleware('permission:0,1,2')->name('forms.storeInput');
            Route::get('/print-input/{id}', 'FormController@printInput')->middleware('permission:0,1,2,3')->name('forms.printInput');
            Route::get('/show-product-by-purchase-order/{id}', 'FormController@showProductOnPurOrder')->middleware('permission:0,1,2')->name('forms.showProductOnPurOrder');
            Route::delete('/{id}/input', 'FormController@destroyInput')->middleware('permission:0,1,2')->name('forms.destroyInput');
            Route::get('/search/input', 'FormController@searchInput')->middleware('permission:0,1,2,3')->name('forms.searchInput');
            Route::patch('/{id}/update-status-input', 'FormController@UpdateStatusInput')->middleware('permission:0,1,2')->name('forms.updateStatusInput');
            Route::get('/bill-out-stocks', 'FormController@listBillOutStocks')->middleware('permission:0,1,2,3')->name('forms.listBillOutStocks');
            Route::get('/create-bill-out-stock', 'FormController@createBillOutStock')->middleware('permission:0,1,2')->name('forms.createBillOutStock');
            Route::post('/store-bill-out-stock', 'FormController@storeBillOutStock')->middleware('permission:0,1,2')->name('forms.storeBillOutStock');
            Route::get('/print-bill-out-stock/{id}', 'FormController@printBillOutStock')->middleware('permission:0,1,2,3')->name('forms.printBillOutStock');
            Route::delete('/{id}/bill-out-stock', 'FormController@destroyBillOutStock')->middleware('permission:0,1,2')->name('forms.destroyBillOutStock');
            Route::get('/search/bill-out-stock', 'FormController@searchBillOutStock')->middleware('permission:0,1,2,3')->name('forms.searchBillOutStock');
            Route::patch('/{id}/update-status-bill-outstock', 'FormController@UpdateStatusBillOutStock')->middleware('permission:0,1,2')->name('forms.updateStatusBillOutStock');
            Route::get('/bill-orders', 'FormController@listBillOrders')->middleware('permission:0,1,2,3')->name('forms.listBillOrders');
            Route::get('/create-bill-order', 'FormController@createBillOrder')->middleware('permission:0,1,2')->name('forms.createBillOrder');
            Route::post('/store-bill-order', 'FormController@storeBillOrder')->middleware('permission:0,1,2')->name('forms.storeBillOrder');
            Route::get('/print-bill-order/{id}', 'FormController@printBillOrder')->middleware('permission:0,1,2,3')->name('forms.printBillOrder');
            Route::get('/show-product-by-input/{id}', 'FormController@showProductOnInput')->middleware('permission:0,1,2')->name('forms.showProductOnInput');
            Route::delete('/{id}/bill-order', 'FormController@destroyBillOrder')->middleware('permission:0,1,2')->name('forms.destroyBillOrder');
            Route::get('/search/bill-order', 'FormController@searchBillOrder')->middleware('permission:0,1,2,3')->name('forms.searchBillOrder');
            Route::get('/{id}/update-status-bill-order', 'FormController@UpdateStatusBillOrder')->middleware('permission:0,1,2')->name('forms.updateStatusBillOrder');
            Route::get('/bill-exchanges', 'FormController@listBillExchanges')->middleware('permission:0,1,2,3,4')->name('forms.listBillExchanges');
            Route::get('/create-bill-exchange', 'FormController@createBillExchange')->middleware('permission:0,1,4')->name('forms.createBillExchange');
            Route::post('/store-bill-exchange', 'FormController@storeBillExchange')->middleware('permission:0,1,4')->name('forms.storeBillExchange');
            Route::get('/print-bill-exchange/{id}', 'FormController@printBillExchange')->middleware('permission:0,1,2,3,4')->name('forms.printBillExchange');
            Route::get('/show-product-by-order/{id}', 'FormController@showProductOnOrder')->middleware('permission:0,1,4')->name('forms.showProductOnOrder');
            Route::delete('/{id}/bill-exchange', 'FormController@destroyBillExchange')->middleware('permission:0,1,4')->name('forms.destroyBillExchange');
            Route::get('/search/bill-exchange', 'FormController@searchBillExchange')->middleware('permission:0,1,2,3,4')->name('forms.searchBillExchange');
        });

        Route::prefix('barcode')->group(function () {
            Route::get('/', 'BarcodeController@barcode')->middleware('permission:0,1,2')->name('barcode.index');
        });

        Route::prefix('product_defectives')->group(function() {
            Route::get('/', 'ProductDefectiveController@index')->middleware('permission:0,1,2,3,4')->name('product-defectives.index');
        });
    });
});

Route::get('/page/403', function() {
    return view('cms.layouts.403');
})->name('page-403');

