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
Route::delete('company/delete/{id}', 'CompanyController@destroy')->name('company/delete');
Route::get('edit/company/{id}', 'CompanyController@edit')->name('edit/company');
Route::put('companies/update/{id}', 'CompanyController@update')->name('companies/update');


Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('employee/create', 'EmployeeController@create')->name('employee/create');
Route::post('employee', 'EmployeeController@store')->name('employee');
Route::delete('employee/delete/{id}', 'EmployeeController@destroy')->name('employee/delete');

Route::get('edit/employee/{id}', 'EmployeeController@edit')->name('edit/employee');
Route::put('employees/update/{id}', 'EmployeeController@update')->name('employees/update');
