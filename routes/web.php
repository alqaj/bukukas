<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Website', 'as' => 'website.'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/users/index', 'UserController@index')->name('users.index');
    Route::get('/users/add', 'UserController@add')->name('users.add');
    Route::get('/users/edit/{uuid}', 'UserController@edit')->name('users.edit');
    Route::put('/users/update', 'UserController@update')->name('users.update');

    Route::get('login', 'AuthController@showLoginPage')->name('auth.login');
    Route::post('login', 'AuthController@authenticate')->name('auth.authenticate');
    Route::get('register', 'RegisterController@showRegisterForm')->name('auth.register');
    Route::post('register', 'RegisterController@register')->name('auth.create');


    Route::middleware('auth.web')->group(function () {
        // Route::get('/', 'HomeController@index')->name('home');
        Route::get('/home', 'HomeController@index')->name('auth.home');
        Route::get('logout', 'AuthController@logout')->name('auth.logout');

        Route::get('/mutasi/index', 'MutasiController@index')->name('mutasi.index');
        Route::get('/mutasi/create', 'MutasiController@create')->name('mutasi.create');
        Route::post('/mutasi/store', 'MutasiController@store')->name('mutasi.store');
        Route::get('/mutasi/kategori/{jenis}', 'MutasiController@kategori')->name('mutasi.kategori');
        Route::get('/mutasi/laporan', 'MutasiController@laporan')->name('mutasi.laporan');

        Route::get('/kategori/create', 'KategoriController@create')->name('kategori.create');
        Route::post('/kategori/store', 'KategoriController@store')->name('kategori.store');
        Route::get('/kategori/index', 'KategoriController@index')->name('kategori.index');

        Route::get('/closing/informasi', 'ClosingController@informasi')->name('closing.informasi');
        Route::get('/closing/input', 'ClosingController@input')->name('closing.input');
        Route::get('/closing/review', 'ClosingController@review')->name('closing.review');
        Route::get('/closing/konfirmasi', 'ClosingController@konfirmasi')->name('closing.konfirmasi');
        Route::post('/closing/execute', 'ClosingController@execute')->name('closing.execute');
    });
});