<?php

use Illuminate\Http\Request;

//Route Group API Company
// Route::group(['prefix' => 'v1'], function() {
// Route::resource('pesan', 'API\Company\PesanController');

// });


//adminCv atu Company
Route::get('/company', 'API\Company\CompanyController@index');
Route::get('/company/{id}', 'API\Company\CompanyController@show');
Route::get('/company/komentar/{id}', 'API\Company\CompanyController@showKomentar');
Route::post('/company/search', 'API\Company\CompanyController@search');


// Route::post('admin/register','API\Admin\AuthAdminController@register');
// Route::post('admin/login','API\Admin\AuthAdminController@login');
// Route::get('admin','API\Admin\AuthAdminController@listAdmin');
// Route::get('admin/{admin}','API\Admin\AuthAdminController@getAdmin');

// User/pengguna
Route::post('user/register', 'API\User\AuthUserController@register');
Route::post('user/login', 'API\User\AuthUserController@login');
Route::get('user/{id}', 'API\User\AuthUserController@show');
Route::put('user/{id}', 'API\User\AuthUserController@updateProfile');
Route::post('user/phone/{id}', 'API\User\AuthUserController@updateProfileHp');
Route::post('user/address/{id}', 'API\User\AuthUserController@updateProfileAddress');
Route::post('user/password/{id}', 'API\User\AuthUserController@updatePassword');
Route::post('user/image/{id}', 'API\User\AuthUserController@updateImage');

Route::get('email/verify/{id}', 'API\User\VerificationApiController@verify')->name('verificationapi.verify');

Route::get('email/resend', 'API\User\VerificationApiController@resend')->name('verificationapi.resend');

// Driver
// Route::post('driver/register', 'API\Driver\AuthDriverController@register');
Route::post('driver/login', 'API\Driver\AuthDriverController@login');
Route::get('driverr/{id}', 'API\Driver\DriverController@index');

Route::get('driver/{id}', 'API\Driver\AuthDriverController@show');
Route::post('driver/phone/{id}', 'API\Driver\AuthDriverController@updatePhone');
Route::post('driver/password/{id}', 'API\Driver\AuthDriverController@updatePassword');
Route::post('driver/image/{id}', 'API\Driver\AuthDriverController@updateImage');

Route::get('driver/histori/{id}', 'API\Driver\DriverController@show');
Route::get('driver/detail/{id}','API\Driver\DriverController@showDetail');
Route::get('company-driver', 'API\Company\CompanyController@driver');
Route::get('driver-company', 'API\Company\CompanyController@company');

//Route Pemesanan
Route::get('pesan/getjam', 'API\Pesan\PesanController@getJam')->name('pesan.jam');
Route::resource('pesan', 'API\Pesan\PesanController')
    ->except(['create', 'update', 'edit']);
Route::get('pesan/{id}', 'API\Pesan\PesanController@show');
Route::get('pesan/detail/{id}', 'API\Pesan\PesanController@showDetailHistory');
Route::get('showJam', 'API\Pesan\PesanController@showJam')->name('pesan.show');
Route::post('pesan/bukti/{id}', 'API\Pesan\PesanController@uploadBukti');
Route::post('pesan/konfirmasi/{id}', 'API\Pesan\PesanController@driverKonfirmasi');
Route::put('pesan/{id}', 'API\Pesan\PesanController@updateKomentar');
