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


Route::view("/", "desktop.pages.index")->name("desktop.index");
Route::view("/find-loads", "desktop.pages.find-loads")->name("desktop.find-loads");
Route::view("/find-transporter", "desktop.pages.find-transporter")->name("desktop.find-transporter");
Route::view("/how-it-works", "desktop.pages.how-it-works")->name("desktop.how-it-works");
Route::view("/who-we-are", "desktop.pages.who-we-are")->name("desktop.who-we-are");
Route::view("/fequently-asked-questions", "desktop.pages.fequently-asked-questions")->name("desktop.fequently-asked-questions");
Route::view("/benefits-transporter-mover-carrier", "desktop.pages.benefits-transporter-mover-carrier")->name("desktop.benefits-transporter-mover-carrier");
Route::view("/recruitment", "desktop.pages.recruitment")->name("desktop.recruitment");
Route::view("/tips-moving", "desktop.pages.tips-moving")->name("desktop.tips-moving");
Route::view("/search-transporter-mover-carrier", "desktop.pages.search-transporter-mover-carrier")->name("desktop.search-transporter-mover-carrier");
Route::view("/company-move", "desktop.pages.company-move")->name("desktop.company-move");
Route::view("/reviews", "desktop.pages.reviews")->name("desktop.reviews");
Route::view("/ebay-sellers", "desktop.pages.ebay-sellers")->name("desktop.ebay-sellers");
Route::view("/quality-charter", "desktop.pages.quality-charter")->name("desktop.quality-charter");
Route::view("/privacy", "desktop.pages.privacy")->name("desktop.privacy");
Route::view("/contact-us", "desktop.pages.contact-us")->name("desktop.contact-us");
Route::view("/fraud-prevention", "desktop.pages.fraud-prevention")->name("desktop.fraud-prevention");

Route::view("/register", "desktop.pages.register")->name("desktop.register");
Route::view("/register-transporter", "desktop.pages.register-transporter")->name("desktop.register-transporter");
Route::view("/register-user", "desktop.pages.register-user")->name("desktop.register-user");

Route::view("/login", "desktop.pages.login")->name("desktop.login");

Route::group(['middleware' => 'role:web-developer'], function () {
    Route::get('/dashboard', function () {
        return 'Добро пожаловать, Веб-разработчик';
    });
});


Route::group(["prefix" => "admin"], function () {
    Route::view("/", "admin.pages.index")->name("admin.index");
    Route::view("/login", "admin.pages.login")->name("admin.login");
    Route::view("/users", "admin.pages.users")->name("admin.users");
});
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
