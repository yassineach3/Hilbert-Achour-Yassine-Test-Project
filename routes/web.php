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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/companies', 'CompanyController@index')->name('companies');
Route::get('company/create', 'CompanyController@create')->name('company/create');
Route::post('company', 'CompanyController@store')->name('company');

Route::get('edit/{id}', 'CompanyController@edit')->name('edit');
Route::put('videos/update/{id}', 'CompanyController@update')->name('videos/update');
Route::delete('videos/delete/{id}', 'CompanyController@destroy')->name('videos/delete');


