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


Route::view("/","desktop.pages.index")->name("desktop.index");
Route::view("/find-loads","desktop.pages.find-loads")->name("desktop.find-loads");

Route::group(['middleware' => 'role:web-developer'], function() {
    Route::get('/dashboard', function() {
        return 'Добро пожаловать, Веб-разработчик';
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
