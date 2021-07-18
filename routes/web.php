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

Route::group(['as' => 'qr.'], function () {
  Route::get('/', 'QrcodeController@index')->name('builder');
  Route::post('/', 'QrcodeController@qrCodeGenerator');
  Route::get('/qr_email', 'QrcodeController@qrEmail')->name('email');
  Route::post('/qr_email', 'QrcodeController@qrEmailBilder');
  Route::get('/qr_phone', 'QrcodeController@qrPhone')->name('phone');
  Route::post('/qr_phone', 'QrcodeController@qrPhoneBuilder');
  Route::get('/qr_sms', 'QrcodeController@qrSms')->name('sms');
  Route::post('/qr_sms', 'QrcodeController@qrSmsBuilder');
  Route::get('/qr_geo', 'QrcodeController@qrGeo')->name('geo');
  Route::post('/qr_geo', 'QrcodeController@qrGeoBuilder');
});
