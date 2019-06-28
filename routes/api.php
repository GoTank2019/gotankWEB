<?php

use Illuminate\Http\Request;

//Route Group API Company
// Route::group(['prefix' => 'v1'], function() {
// Route::resource('pesan', 'API\Company\PesanController');

// });


//adminCv atu Company
Route::get('/company', 'API\Company\CompanyController@index');
Route::get('/company/{id}', 'API\Company\CompanyController@show');
// Route::post('admin/register','API\Admin\AuthAdminController@register');
// Route::post('admin/login','API\Admin\AuthAdminController@login');
// Route::get('admin','API\Admin\AuthAdminController@listAdmin');
// Route::get('admin/{admin}','API\Admin\AuthAdminController@getAdmin');

// User/pengguna
Route::post('user/register', 'API\User\AuthUserController@register');
Route::post('user/login', 'API\User\AuthUserController@login');
Route::get('user/{id}', 'API\User\AuthUserController@show');
Route::put('user/{id}', 'API\User\AuthUserController@updateProfile');
Route::post('user/image/{id}', 'API\User\AuthUserController@updateImage');

// Driver
Route::post('driver/register', 'API\Driver\AuthDriverController@register');
Route::post('driver/login', 'API\Driver\AuthDriverController@login');

Route::get('driver', 'API\Driver\DriverController@index');
Route::get('company-driver', 'API\Company\CompanyController@driver');
Route::get('driver-company', 'API\Company\CompanyController@company');

//Route Pemesanan
Route::get('pesan/getjam', 'API\Pesan\PesanController@getJam')->name('pesan.jam');
Route::resource('pesan', 'API\Pesan\PesanController')
    ->except(['create', 'update', 'edit']);
Route::get('pesan/{id}','API\Pesan\PesanController@show');
Route::get('pesan/detail/{id}','API\Pesan\PesanController@showDetailHistory');
Route::get('showJam', 'API\Pesan\PesanController@showJam')->name('pesan.show');
Route::post('pesan/bukti/{id}', 'API\Pesan\PesanController@uploadBukti');
