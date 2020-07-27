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

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/c', 'CategoryController@show');
Route::get('/c/create', 'CategoryController@create');
Route::post('/c/store', 'CategoryController@store');
Route::get('/c/{category}/edit', 'CategoryController@edit');
Route::patch('/c/{category}', 'CategoryController@update');
Route::delete('/c/{category}/delete', 'CategoryController@destroy');

Route::get('/i', 'ItemController@show');
Route::get('/i/create', 'ItemController@create');
Route::post('/i/store', 'ItemController@store');
Route::get('/i/{item}/edit', 'ItemController@edit');
Route::patch('/i/{item}', 'ItemController@update');
Route::delete('/i/{item}/delete', 'ItemController@destroy');

Route::get('/pr', 'ProfileController@show');
Route::get('/cp', 'ProfileController@changePassword');

Route::get('/ct', 'CustomerController@show');
Route::get('/ct/create', 'CustomerController@create');
Route::post('/ct/store', 'CustomerController@store');
Route::get('/ct/{customer}/edit', 'CustomerController@edit');
Route::patch('/ct/{customer}', 'CustomerController@update');
Route::delete('/ct/{customer}/delete', 'CustomerController@destroy');

Route::get('/iv', 'InvoiceController@show');
Route::get('/iv/create', 'InvoiceController@create');
Route::post('/iv/store', 'InvoiceController@store');
Route::get('/iv/{invoice}/edit', 'InvoiceController@edit');
Route::patch('/iv/{invoice}', 'InvoiceController@update');
Route::delete('/iv/{invoice}/delete', 'InvoiceController@destroy');

Route::get('/home', 'HomeController@index')->name('home');
