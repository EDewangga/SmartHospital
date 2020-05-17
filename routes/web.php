<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/room', 'KamarController@index');

Route::get('periksa', 'PeriksaController@index');
Route::post('periksa', 'PeriksaController@Store');

Route::get('qrcode', function () {
    return QrCode::size(300)->generate('A basic example of QR code!');
});

Route::get('/json-kelaskamar','KamarController@kelaskamar');
