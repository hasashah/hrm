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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('indexes.index');
});

Route::resource('cellnumbers', 'cellnumbercontroller');
Route::get('cellnumbers/{cellnumber}/delete', ['as' => 'cellnumbers.delete', 'uses' => 'CellnumberController@destroy']);
Route::resource('employeedetails', 'EmployeedetailController');
Route::get('/csvfile', 'CsvfileController@index');
Route::get('uploadfile','HomeController@uploadfile');
Route::post('uploadfile','HomeController@uploadFilePost');

Route::resource('personals', 'PersonalController');

Route::resource('sliders', 'SliderController');
Route::resource('imagesliders', 'ImagesliderController');