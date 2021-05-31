<?php

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

Route::group(["prefix" => "desktop"], function () {
    Route::group(["prefix" => "v1"], function () {
        Route::get("/get-type-of-transport", DictionaryController::class . "@typeOfTransport");
        Route::get("/get-type-of-object", DictionaryController::class . "@typeOfObject");
        Route::get("/get-type-of-object/{category_id}", DictionaryController::class . "@typeOfObjectByCategory");
        Route::get("/get-vehicles", DictionaryController::class . "@vehicles");
        Route::get("/get-latest-transactions", DictionaryController::class . "@latestTransactions");
        Route::get("/get-top-movers", DictionaryController::class . "@topMovers");
        Route::post("/register", RegisterController::class . "@createUser");
        Route::post("/login", LoginController::class . "@login");
    });
});




