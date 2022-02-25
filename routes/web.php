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

Route::get('/','UserController@usersList');
Route::get('/Billcalculate','BillCalculator@index');
Route::post('calculateBill','BillCalculator@calculateBill');
Route::get('adduser','UserController@showAddform');
Route::post('adduser','UserController@adduser');
Route::get('usersList','UserController@usersList');
