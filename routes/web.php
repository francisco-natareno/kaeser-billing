<?php

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
});

Auth::routes(['register' => false]);

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::get('files', 'FileController@index')->name('files.index');
Route::post('files', 'FileController@store')->name('files.store');
Route::get('invoices', 'InvoiceController@index')->name('invoices.index');
Route::post('invoices/transfer/{id}', 'InvoiceController@transfer')->name('invoices.transfer');
Route::post('invoices/cancel/{id}', 'InvoiceController@cancel')->name('invoices.cancel');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('machines', 'MachineController@index')->name('machines.index');