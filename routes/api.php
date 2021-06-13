<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DictionaryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/get-type-of-transport", DictionaryController::class . "@typeOfTransport");
Route::get("/get-type-of-object", DictionaryController::class . "@typeOfObject");
Route::get("/get-type-of-object/{category_id}", DictionaryController::class . "@typeOfObjectByCategory");
Route::get("/get-vehicles", DictionaryController::class . "@vehicles");
Route::get("/get-latest-transactions", DictionaryController::class . "@latestTransactions");
Route::get("/get-top-movers", DictionaryController::class . "@topMovers");
Route::post("/register", RegisterController::class . "@createUser");
Route::post("/login", \Auth\LoginController::class . "@login");

Route::group(["prefix" => "cars"], function () {
    Route::get("/categories", DictionaryController::class . "@carsCategories");
    Route::get("/marks/{categoryId}", DictionaryController::class . "@carsMarks");
    Route::get("/models/{categoryId}/{markId}", DictionaryController::class . "@carsModels");
});

Route::group(["prefix" => "locations"], function () {
    Route::get("/countries", DictionaryController::class . "@getCountries");
    Route::get("/cities/{country}", DictionaryController::class . "@getCities");
});

Route::group(["prefix" => "dist"], function () {
    Route::get("/math/{fA}/{lA}/{fB}/{lB}", DictionaryController::class . "@getMathDist");
    Route::get("/api/{fA}/{lA}/{fB}/{lB}", DictionaryController::class . "@getApiDist");
    Route::get("/route/{fA}/{lA}/{fB}/{lB}", DictionaryController::class . "@getRoute");
    Route::get("/coords/{address}", DictionaryController::class . "@getCoords");
});
Route::get("/getAddress/{address}/{lang}", "DictionaryController@getAddress");
//category
Route::group(["prefix" => "categories"], function () {
    Route::get('/', 'CategoryController@index');
});
//listing
Route::group(["prefix"=>"listings"],function() {
    Route::get('/', 'ListingController@index');
});
Route::group(["prefix"=>"listing"],function() {
    Route::post('/', 'ListingController@store');
});




