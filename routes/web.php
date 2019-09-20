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

Auth::routes(['register' => false,'verify' => false,'reset' => false]);

Route::middleware(['web','auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('companies', 'CompaniesController');
    Route::resource('employees', 'EmployeesController');
    Route::get('/data', 'CompaniesController@data');
    Route::get('/dataEmployees', 'EmployeesController@data');
});

