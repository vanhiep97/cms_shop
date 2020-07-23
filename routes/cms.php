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
            Route::get('/', 'PosController@index')->name('pos.index');
            Route::get('/search/products', 'PosController@searchProductOnPos')->name('pos.searchProductOnPos');
            Route::get('/search/customers', 'PosController@searchCustomerOnPos')->name('pos.searchCustomerOnPos');
            Route::get('/buy/{id}/products', 'PosController@buyProductOnPos')->name('pos.buyProductOnPos');
        });

        Route::prefix('group-products')->group(function () {
            Route::get('/', 'ProductGroupController@index')->name('group-products.index');
            Route::post('/', 'ProductGroupController@store')->name('group-products.store');
            Route::get('/{id}/edit', 'ProductGroupController@edit')->name('group-products.edit');
            Route::patch('/{id}', 'ProductGroupController@update')->name('group-products.update');
            Route::delete('/{id}', 'ProductGroupController@destroy')->name('group-products.destroy');
        });

        Route::prefix('manufactures')->group(function () {
            Route::get('/', 'ManufactureController@index')->name('manufactures.index');
            Route::post('/', 'ManufactureController@store')->name('manufactures.store');
            Route::get('/{id}/edit', 'ManufactureController@edit')->name('manufactures.edit');
            Route::patch('/{id}', 'ManufactureController@update')->name('manufactures.update');
            Route::delete('/{id}', 'ManufactureController@destroy')->name('manufactures.destroy');
        });

        Route::prefix('products')->group(function () {
            Route::get('/', 'ProductController@index')->name('products.index');
            Route::get('/export', 'ProductController@export')->name('products.export');
            Route::get('/create', 'ProductController@create')->name('products.create');
            Route::post('/', 'ProductController@store')->name('products.store');
            Route::get('/{id}/edit', 'ProductController@edit')->name('products.edit');
            Route::get('/{id}/copy', 'ProductController@copy')->name('products.copy');
            Route::patch('/{id}', 'ProductController@update')->name('products.update');
            Route::delete('/{id}', 'ProductController@destroy')->name('products.destroy');
            Route::patch('/{id}/update-status', 'ProductController@updateStatus')->name('products.update-status');
            Route::get('/show-product-by-res', 'ProductController@showProductByRes')->name('products.show-product-by-res');
            Route::post('restore-product-soft-delete/{id}', 'ProductController@restoreSoftDeleteProduct')->name('products.restore-product-soft-delete');
            Route::get('/search', 'ProductController@searchProduct')->name('products.search');
        });

        Route::prefix('orders')->group(function () {
            Route::get('/', 'OrderController@index')->name('orders.index');
            Route::post('/save-order', 'OrderController@saveOrder')->name('orders.save-order');
            Route::post('/print-order','OrderController@printOrder')->name('orders.print-order');
        });

        Route::prefix('customers')->group(function () {
            Route::get('/', 'CustomerController@index')->name('customers.index');
            Route::post('/', 'CustomerController@store')->name('customers.store');
            Route::get('/{id}/edit', 'CustomerController@edit')->name('customers.edit');
            Route::patch('/{id}', 'CustomerController@update')->name('customers.update');
            Route::delete('/{id}', 'CustomerController@destroy')->name('customers.destroy');
            Route::post('/send-notification', 'CustomerController@sendNotification')->name('customers.send-notification');
        });

        Route::prefix('suppliers')->group(function () {
            Route::get('/', 'SupplierController@index')->name('suppliers.index');
            Route::post('/create-suppliers', 'SupplierController@createSuppliers')->name('suppliers.store');
            Route::get('/{id}/edit', 'SupplierController@editSupplier')->name('suppliers.edit-supplier');
            Route::patch('/{id}', 'SupplierController@update')->name('suppliers.update');
            Route::delete('/{id}', 'SupplierController@delete')->name('suppliers.destroy');
        });

        Route::prefix('settings')->group(function () {
            Route::get('/', 'SettingController@index')->name('settings.index');
            Route::post('/create-users', 'SettingController@createUsers')->name('settings.create-users');
            Route::get('/{id}/edit', 'SettingController@editUser')->name('settings.edit-user');
            Route::patch('/{id}', 'SettingController@update')->name('settings.update');
            Route::delete('/{id}', 'SettingController@delete')->name('settings.destroy');

        });

        Route::prefix('profits')->group(function () {
            Route::get('/', 'ProfitController@index')->name('profits.index');
        });

        Route::prefix('revenues')->group(function () {
            Route::get('/', 'RevenueController@index')->name('revenues.index');
        });

        Route::prefix('inventories')->group(function () {
            Route::get('/', 'InventoryController@index')->name('inventories.index');
        });

        Route::prefix('forms')->group(function () {
            Route::get('/search/products', 'FormController@searchProductOnForm')->name('forms.searchProductOnImport');
            Route::get('/search/suppliers', 'FormController@searchSupplierOnForm')->name('forms.searchCustomerOnImport');
            Route::get('/buy/{id}/products', 'FormController@buyProductOnForm')->name('forms.buyProductOnPos');
            Route::get('/purchase-orders', 'FormController@listPurchaseOrders')->name('forms.listPurchaseOrders');
            Route::get('/create-purchase-order', 'FormController@createPurchaseOrder')->name('forms.createPurchaseOrder');
            Route::post('/store-purchase-order', 'FormController@storePurchaseOrder')->name('forms.storePurchaseOrder');
            Route::get('/print-purchase-order/{id}', 'FormController@printPurchaseOrder')->name('form.printPurchaseOrder');
            Route::get('/inputs', 'FormController@listInputs')->name('forms.listInputs');
            Route::get('/create-input', 'FormController@createInput')->name('forms.createInput');
            Route::post('/store-input', 'FormController@storeInput')->name('forms.storeInput');
            Route::get('/print-input/{id}', 'FormController@printInput')->name('form.printInput');
            Route::get('/show-product-by-purchase-order/{id}', 'FormController@showProductOnPurOrder')->name('forms.showProductOnPurOrder');
            Route::get('/bill-orders', 'FormController@listBillOrders')->name('forms.listBillOrders');
            Route::get('/create-bill-order', 'FormController@createBillOrder')->name('forms.createBillOrder');
            Route::post('/store-bill-order', 'FormController@storeBillOrder')->name('forms.storeBillOrder');
            Route::get('/show-product-by-input/{id}', 'FormController@showProductOnInput')->name('forms.showProductOnInput');
        });

        Route::prefix('barcode')->group(function () {
            Route::get('/', 'BarcodeController@barcode')->name('barcode.index');
        });

        Route::prefix('notifications')->group(function () {
            Route::post('save-device-token', 'NotificationController@saveToken')->name('save-device-token');
            Route::post('send-push', 'NotificationController@sendPush')->name('send-push');
            Route::get('/', 'NotificationController@index')->name('notifications.index');
        });
    });
});



