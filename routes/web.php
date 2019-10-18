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

Route::get('/',function(){
	return	redirect('/home/login');
});

Route::prefix('home')->group(function(){
    Route::get('/login', 'Auth\LoginPemilihController@showLoginForm')->name('home.login');
    Route::post('/login', 'Auth\LoginPemilihController@login')->name('home.login.submit');
    Route::get('/', 'PemilihanController@index')->name('home'); //milih calon
});

// Route::get('/home/login', 'Auth\LoginPemilihController@login');
Route::post('/home/logout', 'UtamaController@store');

Route::get('/rekapitulasi', 'UtamaController@rekap');

Route::get('/profile', 'UtamaController@profile');
Route::get('/profile/calon/{id}', 'UtamaController@show');

// Route::post('/loginPost', 'Auth\LoginPemilihController@loginPost');
Route::post('/registerPost', 'Auth\LoginPemilihController@registerPost');
// Route::get('/checkLogin', 'LoginPemilihController@checkLogin');

// ADMIN
Route::get('/admin', 'AdminController@index');
Route::put('/admin/lokasi', 'PagecalonController@updatelokasi');

Route::get('/admin/pemilih', 'PagepemilihController@index');
Route::get('/admin/pemilih/create', 'PagepemilihController@create');
Route::post('/admin/pemilih', 'PagepemilihController@store');
Route::get('/admin/pemilih/edit/{id}', 'PagepemilihController@edit');
Route::put('/admin/pemilih/{id}', 'PagepemilihController@update');
Route::delete('/admin/pemilih/delete/{id}', 'PagepemilihController@destroy');

Route::get('/admin/administrator', 'AdminController@listAdministrator');
Route::get('/admin/administrator/create', 'AdminController@createAdministrator');
Route::post('/admin/administrator', 'Auth\RegisterController@create');
Route::get('/admin/administrator/edit/{id}', 'AdminController@editAdministrator');
Route::put('/admin/administrator/{id}', 'AdminController@updateAdministrator');
Route::delete('/admin/administrator/delete/{id}', 'AdminController@destroyAdministrator');

Route::get('/admin/calon', 'PagecalonController@index');
Route::get('/admin/calon/create', 'PagecalonController@create');
Route::post('/admin/calon', 'PagecalonController@store');
Route::get('/admin/calon/edit/{id}', 'PagecalonController@edit');
Route::put('/admin/calon/{id}', 'PagecalonController@update');
Route::delete('/admin/calon/delete/{id}', 'PagecalonController@destroy');
Route::get('/admin/calon/verif/{id}', 'PagecalonController@verif');

Auth::routes();

// https://khoerodin.id/others/memahami-middleware-dalam-laravel/