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

Route::middleware('auth:api')->post('/lelang/{id}/tawaran', 'LelangController@offer');
Route::get('/lelang/{id}', 'LelangController@showApi');
