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

Route::get('/', 'HomeController@index');
Route::get('/view/{id}','HomeController@view')->name('view');
Route::get('/input', 'InputController@index');
Route::get('/temp-dakar', 'InputController@tempdakar');
Route::get('/temp-pkwt', 'InputController@temppkwt');
Route::post('/import-karyawan', 'InputController@importemp');
Route::post('/import-pkwt', 'InputController@importpkwt');
Route::post('/edit-statussign', 'HomeController@editPkwtStatus');
Route::get('/export-excel', 'ExportController@exportexcel');
