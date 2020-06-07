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

Route::get('/room', 'RoomController@index');

Route::get('periksa', 'AppointmentController@index');
Route::post('periksa', 'AppointmentController@Store');
Route::get('periksa/{id}', 'AppointmentController@show');

Route::get('qrcode', function () {
    return QrCode::size(300)->generate('A basic example of QR code!');
});

Route::get('/json-kelaskamar','RoomController@kelaskamar');
