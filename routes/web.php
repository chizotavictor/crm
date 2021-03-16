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
Route::get('/add-company', 'HomeController@addCompany')->name('add-company');
Route::post('/addcompany-submit', 'HomeController@addCompanySubmit')->name('addcompany-submit');
Route::get('/add-employee', 'HomeController@addEmployee')->name('add-employee');
Route::post('/add-employee', 'HomeController@addEmployeeSubmit')->name('add-employee-submit');
Route::get('/employees', 'HomeController@employees')->name('employees');