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

Route::get('/', function () {
	return view('welcome');
})->middleware('guest:masyarakat,petugas');

Route::post('/logout', 'admin\AuthController@logout')->name('logout');

Route::group(['middleware' => 'guest', 'as' => 'admin::', 'prefix' => 'admin'], function () {
	Route::get('/login', 'admin\AuthController@loginView')->name('login');
	Route::post('/login', 'admin\AuthController@login')->name('login');
});


Route::get('/admin', function () {
	return redirect()->route('admin::home');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth:petugas', 'as' => 'admin::'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('barang', 'admin\BarangController')->except('show');
	Route::resource('lelang', 'admin\LelangController')->except('edit');
});

Route::group(['middleware' => 'auth:petugas'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');
	Route::get('table-list', function () {
		return view('pages.tables');
	})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

/**
 * ================ Public Route ================
 */

// Auth
Route::group(['middleware' => 'guest:petugas,masyarakat'], function () {
	Route::get('/register', 'AuthController@registerView')->name('register');
	Route::post('/register', 'AuthController@register')->name('register');
	Route::get('/login', 'AuthController@loginView')->name('login');
	Route::post('/login', 'AuthController@login')->name('login');
});

Route::resource('lelang', 'LelangController');
