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

Route::get('/kamar', 'RoomController@index');

Route::get('/doctor', 'DoctorController@index');

Route::get('/prescription', 'MedicalController@prescription');
Route::post('/prescription/fetch', 'MedicalController@fetch')->name('dynamicdependent.fetch');
Route::post('/prescription/fetch-result', 'MedicalController@fetchResult')->name('dynamicdependent.fetch.result');

Route::get('/reservation', 'RoomController@reservation');
Route::post('/reservation/fetch', 'RoomController@fetch')->name('dynamicdependent.fetch');
Route::post('/reservation/fetch-result', 'RoomController@fetchResult')->name('dynamicdependent.fetch.result');

Route::get('/data/cart/{id}', 'CartController@userCart');
Route::post('/add-cart', 'CartController@addCart');
Route::post('/delete-cart', 'CartController@deleteCart');
Route::post('/checkout', 'CartController@checkout');

Route::get('medical', 'MedicalController@index');
Route::post('medical', 'MedicalController@Store');
Route::get('medical/{id}', 'MedicalController@show');

Route::get('periksa', 'AppointmentController@index');
Route::post('periksa', 'AppointmentController@Store');
Route::get('periksa/{id}', 'AppointmentController@show');

Route::get('/registrasi', 'AppointmentController@book');

Route::get('qrcode', function () {
    return QrCode::size(300)->generate('A basic example of QR code!');
});

Route::get('/scanqr', function () {
    return view('scanqr');
});

Route::get('/json-kelaskamar','RoomController@kelaskamar');
