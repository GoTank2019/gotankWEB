<?php

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

Route::get('/editprofile', function() {
  return view ('pages.company._editProfile');
});

Route::get('dashboard', function() {
  return view('pages.company.dashboard');
});

//route Admin CV atau Company
Route::group(['prefix' => '/'], function(){
  //route login dan register
  Route::get('login','AuthCompany\AuthCompanyController@showLoginForm')->name('login');
  Route::get('register','AuthCompany\AuthCompanyController@showRegisterForm')->name('register');
  Route::post('login','AuthCompany\AuthCompanyController@login')->name('company.login');
  Route::post('register','AuthCompany\AuthCompanyController@register', (['verify' => true]))->name('company.register');
  Route::post('logout','AuthCompany\AuthCompanyController@logoutCompany')->name('logout');
  Route::get('beranda','Company\CompanyController@index')->name('dashboard');

  Route::get('beranda/profile', 'Company\CompanyController@profile')->name('beranda.profile');

  Route::get('profile/edit', 'Company\CompanyController@edit')->name('profile.edit');
  // Route::post('post-profile/edit', 'Company\CompanyController@edit')->name('post-profile.edit');
  Route::patch('post-profile/update', 'Company\CompanyController@update')->name('post-profile.update');

  //route CRUD pemesanan
  Route::resource('pesan', 'Company\PesanController');

  //route CRUD Company untuk driver
  Route::resource('driver', 'Company\DriverController');
  Route::get('driver/{drivers}', 'Company\DriverController@show')->name('driver.show');
  Route::get('/export', 'Company\DriverController@export')->name('driver.export');
});

//route Super Admin
Route::group(['prefix' => 'admin/'], function(){
  Route::get('login','AuthAdmin\AuthAdminController@showLoginForm')->name('admin.login');
  Route::post('login','AuthAdmin\AuthAdminController@login')->name('get.admin.login');
  Route::post('logout','AuthAdmin\AuthAdminController@logoutAdmin')->name('admin.logout');
  Route::get('beranda','Admin\AdminController@index')->name('admin.dashboard');
  
  //Route Super Admin CRUD untuk User
  Route::resource('user','Admin\UserController');

  //Route Super Admin CRUD untuk company
  Route::resource('company', 'Admin\CompanyController');
});
