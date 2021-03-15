<?php

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('fetch-user', function () {
    return Masyarakat::all();
});

Route::group(['as' => 'api::'], function () {
    Route::group(['middleware' => 'auth:petugas-api'], function () {
        Route::post('/barang/{id}/photo', 'admin\BarangController@photoStore')->name('photo.store');
    });
    Route::get('/barang/{id}/photos', 'admin\BarangController@photos')->name('photos');
    Route::get('/images', 'admin\BarangController@getPhoto')->name('photo.get.thumbnail');
    Route::post('/images/delete', 'admin\BarangController@deletePhoto')->name('photo.delete');
});



Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/lelang/{id}/tawaran', 'LelangController@offer');
});

Route::get('/lelang/{id}', 'LelangController@showApi');
