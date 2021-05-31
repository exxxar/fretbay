<?php

use Illuminate\Support\Facades\App;
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
Route::view("/profile-personal-info", "desktop.pages.profile.profile-personal-info")->name("desktop.profile-personal-info");
Route::view("/activity-listing", "desktop.pages.profile.customer.activity-listing")->name("desktop.activity-listing");
Route::view("/listings", "desktop.pages.profile.customer.listings")->name("desktop.listings");

Route::view("/profile-transporter-wizard-start", "desktop.pages.profile.transporter.profile-transporter-wizard-start")->name("desktop.profile-transporter-wizard-start");
Route::view("/profile-transporter-wizard-step-1", "desktop.pages.profile.transporter.profile-transporter-wizard-step-1")->name("desktop.profile-transporter-wizard-step-1");
Route::view("/profile-transporter-wizard-step-2", "desktop.pages.profile.transporter.profile-transporter-wizard-step-2")->name("desktop.profile-transporter-wizard-step-2");
Route::view("/profile-transporter-wizard-step-3", "desktop.pages.profile.transporter.profile-transporter-wizard-step-3")->name("desktop.profile-transporter-wizard-step-3");
Route::view("/profile-transporter-wizard-step-4", "desktop.pages.profile.transporter.profile-transporter-wizard-step-4")->name("desktop.profile-transporter-wizard-step-4");
Route::view("/profile-transporter-wizard-step-5", "desktop.pages.profile.transporter.profile-transporter-wizard-step-5")->name("desktop.profile-transporter-wizard-step-5");

Route::view("/login", "desktop.pages.login")->name("desktop.login");

Route::group(['middleware' => 'role:web-developer'], function () {
    Route::get('/dashboard', function () {
        return 'Добро пожаловать, Веб-разработчик';
    });
});
//не админ 
//заходим на /admin => admin/login
Route::get("/admin", "AdminSidebarController@login")->name("admin.login");

//админ
//заходим на /admin => admin
Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::group(["prefix" => "admin"], function () {
        Route::get("/", "AdminSidebarController@index")->name("admin.index");
        Route::get("/orders", "AdminSidebarController@orders")->name("admin.orders");

        Route::group(["prefix" => "objects"], function () {
            Route::get("/categories", "AdminSidebarController@objects_categories")->name("objects.categories");
            Route::get("/types", "AdminSidebarController@objects_types")->name("objects.types");
            Route::get("/transport-types", "AdminSidebarController@objects_transport_types")->name("objects.transport-types");
            Route::get("/transport", "AdminSidebarController@objects_transport")->name("objects.transport");
        });
        Route::group(["prefix" => "users"], function () {
            Route::get("/list", "AdminSidebarController@users_list")->name("users.list");
            Route::get("/profiles", "AdminSidebarController@users_profiles")->name("users.profiles");
            Route::get("/roles", "AdminSidebarController@users_roles")->name("users.roles");
            Route::get("/permissions", "AdminSidebarController@users_permissions")->name("users.permissions");
        });

        Route::group(["prefix" => "languages"], function () {
            //GET /languages
            //GET /languages/create
            //POST /languages
            //GET /languages/{language}/translations
            //GET /languages/{language}/translations/create
            //POST /languages/{language}/translations
            //PUT /languages/{language}/translations
            Route::get('/', 'LanguageController@index')
                ->name('languages.index');

            Route::get('/create', 'LanguageController@create')
                ->name('languages.create');

            Route::post('/', 'LanguageController@store')
                ->name('languages.store');

            Route::get('/{language}/translations', 'LanguageTranslationController@index')
                ->name('languages.translations.index');

            Route::post('/{language}', 'LanguageTranslationController@update')
                ->name('languages.translations.update');

            Route::get('/{language}/translations/create', 'LanguageTranslationController@create')
                ->name('languages.translations.create');

            Route::post('/{language}/translations', 'LanguageTranslationController@store')
                ->name('languages.translations.store');

            Route::get('/translations', 'LanguageTranslationController@index');

            Route::get('/', 'LanguageController@index')
            ->name('languages.index');
        });
    });
});
// Auth::routes();


Route::post("/logout", "AdminSidebarController@logout")->name("logout");


Route::get('/home', 'HomeController@index')->name('home');
Route::group([
    'middleware' => 'auth',
], function () {
 Route::group(['middleware' => ['role:admin']], function () {
 });
});
