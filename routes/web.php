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

Route::get('/view/dokumentasi/{id}', 'DokController@viewDok')->name('view-dok');
Route::get('/upload/dok/{id}', 'DokController@formDok')->name('upload');
Route::get('/upload/foto', 'DokController@formFoto')->name('upload.foto');
Route::post('/upload/dok/proses/{id}', 'DokController@addDok')->name('upload.proses');
Route::post('/upload/foto/proses', 'DokController@addFoto')->name('upload.foto.proses');

