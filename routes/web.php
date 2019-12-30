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

Route::get('/view/dokumentasi/{id_sub_kegiatan}', 'DokController@viewDok')->name('view-dok');
Route::get('/send/dokumentasi/{id_sub_kegiatan}/{nama_sub_kegiatan}', 'DokController@sendDok')->name('send-dok');