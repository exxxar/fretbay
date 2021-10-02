<?php

use App\Enums\NotificationType;
use App\Events\NotificationEvent;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\ObjectCategory;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


Route::get("/event", function () {
    echo ("t1=". \Carbon\Carbon::createFromTimestampUTC(intval("1633208400000")/1000));
    echo ("t2=1633208400000");


});

Route::get('/locale/{lang}', function (\Illuminate\Http\Request $request, $lang) {

    // Session::forget('lang');
    Session::put('lang', $lang);
    Session::save();

    App::setLocale($lang);

    return redirect()->back();
});

Route::get("/storage/listings/{dir}/{name}", function ($dir, $name) {

    try {
        $file = Storage::disk('local')->get("public/listings/$dir/$name");
        return (new Response($file, 200))
            ->header('Content-Type', 'image/jpeg');
    } catch (Exception $e) {
        return "/images/common/icons/general/content-loader.gif";
    }

});


Route::get("/", function (\Illuminate\Http\Request $request) {

    if (is_null(Auth::user()))
        return view("desktop.pages.index");

    $user = User::self();

    if ($user->hasRole("admin"))
        return redirect()->route("admin.index");

    if ($user->hasRole("transporter")) {
        return redirect()->route("transporter-account");
    }

    return redirect()->route("customer-account");

})->name("desktop.index");


Route::view("/pricing", "desktop.pages.pricing")->name("desktop.pricing");
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
Route::view("/register-customer", "desktop.pages.register-customer")->name("desktop.register-customer");
//Route::view("/profile-personal-info", "desktop.pages.profile.profile-personal-info")->name("desktop.profile-personal-info");
Route::view("/activity-listing", "desktop.pages.profile.customer.activity-listing")->name("desktop.activity-listing");


//Роут на редактирование профиля заказчика
Route::view("/profile-customer", "desktop.pages.profile.customer.profile")->name("desktop.customer-profile");
Route::view("/to-be-confirmed-empty", "desktop.pages.profile.customer.to-be-confirmed-empty")->name("desktop.customer-to-be-confirmed-empty");
Route::view("/to-be-confirmed", "desktop.pages.profile.customer.to-be-confirmed")->name("desktop.customer-to-be-confirmed");

Route::group(['middleware' => 'auth'], function () {
    Route::get('/auth/user', function () {
        $user = User::with(["profile", 'profile.vehicles', 'profile.documents', 'profile.verifications'])->where("id", Auth::id())->first();
        $profile = $user->profile;
        return response()->json([
            'user' => $user,
            'profile' => $profile,
            'vehicles' => $profile->vehicles,
            'documents' => $profile->documents
        ]);
    });
    Route::post('/auth/user/changePassword', "UserController@changePassword");
    Route::get("/profile/{id}", "UserController@profile");
});

Route::view('/push-notificaiton', 'home')->name('push-notificaiton');
Route::post('/fcm-token', [\App\Http\Controllers\NotificationController::class, 'updateToken'])->name('fcmToken');
Route::post('/send-notification',[\App\Http\Controllers\NotificationController::class,'notification'])->name('send.web-notification');

Route::view("/find-loads", "desktop.pages.find-loads")
    ->middleware(['auth' , 'role:transporter'])
    ->name("desktop.find-loads");

Route::group(['middleware' => ['auth', 'verified','role:transporter'], "prefix" => "transporter"], function () {

    Route::post('/listing/quotes/add', 'ListingController@sendQuote');
    Route::post('/listing/quotes/remove', 'ListingController@removeQuote');

    Route::group(["prefix" => "profile"], function () {

        Route::get("/","TransporterController@profile")->name("transporter-account");
        Route::view("/my-company", "desktop.pages.profile.transporter.my-company")->name("transporter-company");
        Route::view("/legal-documents", "desktop.pages.profile.transporter.legal-documents")->name("transporter-legal-documents");
        Route::view("/my-vehicles", "desktop.pages.profile.transporter.my-vehicles")->name("transporter-vehicles");
        Route::view("/settings", "desktop.pages.profile.transporter.settings")->name("transporter-settings");
        Route::post("/save", "TransporterController@save")->name("transporter-profile.save");
        Route::post("/saveWithoutApproval", "TransporterController@saveWithoutApproval")->name("transporter-profile.save-without-approval");
        Route::post("/saveWithApproval", "TransporterController@saveWithApproval")->name("transporter-profile.save-with-approval");
        Route::post("/edit", "TransporterController@update")->name("transporter-profile.update");

        Route::view("/notifications", "desktop.pages.profile.notifications")->name("transporter.notifications");
        Route::view("/favorites", "desktop.pages.profile.favorites")->name("transporter.favorites");

        Route::group(["prefix" => "vehicle"], function () {
            Route::post("/create", "TransporterController@storeVehicle")->name("profile.vehicle.store");
            Route::post("/edit", "TransporterController@updateVehicle")->name("profile.vehicle.update");
            Route::delete("/delete/{id}", "TransporterController@destroyVehicle")->name("profile.vehicle.destroy");
        });
        Route::group(["prefix" => "document"], function () {
            Route::post("/create", "LegalDocumentController@store")->name("profile.document.store");
            Route::post("/edit", "LegalDocumentController@update")->name("profile.document.update");
            Route::post("/restore/{id}", "LegalDocumentController@restore")->name("profile.document.restore");
            Route::delete("/delete/{id}", "LegalDocumentController@delete")->name("profile.document.delete");
            Route::delete("/destroy/{id}", "LegalDocumentController@destroy")->name("profile.document.destroy");
        });


        Route::group(["prefix" => "transporter-wizard"], function () {
            Route::view("/start", "desktop.pages.profile.transporter.profile-transporter-wizard-start")->name("desktop.profile-transporter-wizard-start");
            Route::view("/step-1", "desktop.pages.profile.transporter.profile-transporter-wizard-step-1")->name("desktop.profile-transporter-wizard-step-1");
            Route::view("/step-2", "desktop.pages.profile.transporter.profile-transporter-wizard-step-2")->name("desktop.profile-transporter-wizard-step-2");
            Route::view("/step-3", "desktop.pages.profile.transporter.profile-transporter-wizard-step-3")->name("desktop.profile-transporter-wizard-step-3");
            Route::view("/step-4", "desktop.pages.profile.transporter.profile-transporter-wizard-step-4")->name("desktop.profile-transporter-wizard-step-4");
            Route::view("/step-5", "desktop.pages.profile.transporter.profile-transporter-wizard-step-5")->name("desktop.profile-transporter-wizard-step-5");
        });
    });
});


Route::group(["prefix" => "reviews", "middleware" => ["auth"]], function () {

    Route::get('/list', 'ReviewController@getReviews');


});

Route::group(["prefix" => "orders", "middleware" => ["auth"]], function () {

    Route::get('/list', 'OrderController@index');
    Route::get('/filtered', 'OrderController@filtered');
    Route::get('/without_review', 'OrderController@getOrdersWithoutReview');
    Route::post('/status', 'OrderController@changeOrderStatus');
    Route::post('/accept', 'OrderController@acceptOrder');


    Route::get('/active', 'OrderController@loadActive');
    Route::get('/archive', 'OrderController@loadArchive');
    Route::get('/removed', 'OrderController@loadRemoved');
    Route::delete('/{id}', 'OrderController@destroy');
    Route::get('/restore/{id}', 'OrderController@restore');
    Route::get('/archive/{id}', 'OrderController@addToArchive');

});

Route::group(["prefix" => "listing", "middleware" => ["auth"]], function () {

    Route::get('/active', 'ListingController@loadActive');
    Route::get('/archive', 'ListingController@loadArchive');
    Route::get('/removed', 'ListingController@loadRemoved');
    Route::delete('/{id}', 'ListingController@destroy');
    Route::get('/restore/{id}', 'ListingController@restore');
    Route::get('/archive/{id}', 'ListingController@addToArchive');

    Route::get("/{id}", "ListingController@show")->where(["id" => "[0-9]+"])->name("desktop.listing");
    Route::get("/direction/{id}/{direction?}", "ListingController@goToListing")->name("desktop.direction");
    Route::post('/messages/send', 'ListingController@sendMessage');
    Route::get('/messages/{id}', 'ListingController@loadMessages');
    Route::delete('/messages/remove/{id}', 'ListingController@removeMessage');

    Route::get('/favorites/get', 'FavoriteController@index')->middleware(['auth', 'role:transporter']);
    Route::post('/favorites/add', 'FavoriteController@store')->middleware(['auth', 'role:transporter']);
    Route::post('/favorites/remove', 'FavoriteController@destroy')->middleware(['auth', 'role:transporter']);

});

Route::get('/notifications/get', 'NotificationController@index')->middleware(['auth']);

Route::group(['middleware' => ['auth', 'role:customer'], "prefix" => "customer"], function () {

    Route::post('/listing/quotes/accept', 'ListingController@acceptQuote');
    Route::post('/listing/quotes/decline', 'ListingController@declineQuote');

    Route::group(["prefix" => "profile"], function () {
        Route::view("/", "desktop.pages.profile.customer.index")->name("customer-account");
        Route::view("/listings", "desktop.pages.profile.customer.listings")->name("customer.listings");
        Route::view("/notifications", "desktop.pages.profile.notifications")->name("customer.notifications");
        Route::put("/update", "CustomerController@update")->name("customer.update");

    });
});

Route::group(['middleware' => ['auth', 'role:admin'], "prefix" => "program-admin"], function () {
    Route::get("/", "AdminController@index")->name("admin.index");

    Route::group(["prefix" => "orders"], function () {
        Route::get("/", "AdminController@getOrders")->name("admin.orders");
        Route::get("/add", "OrderController@create")->name("admin.orders.create");
        Route::post("/add", "OrderController@store")->name("admin.orders.store");
        Route::get("/edit/{id}", "OrderController@edit")->name("admin.orders.edit");
        Route::put("/edit/{id}", "OrderController@update")->name("admin.orders.update");
        Route::delete("/delete/{id}", "OrderController@destory")->name("admin.orders.destroy");
    });

    Route::group(["prefix" => "listings"], function () {
        Route::get("/", "AdminController@getListings")->name("admin.listings");
        Route::get("/add", "ListingController@create")->name("admin.listings.create");
        Route::post("/add", "ListingController@store")->name("admin.listings.store");
        Route::get("/edit/{id}", "ListingController@edit")->name("admin.listings.edit");
        Route::put("/edit/{id}", "ListingController@update")->name("admin.listings.update");
        Route::delete("/delete/{id}", "ListingController@destory")->name("admin.listings.destroy");
    });

    Route::group(["prefix" => "categories"], function () {
        Route::get("/", "AdminController@getCategories")->name("admin.categories");
        Route::get("/show/{id}", "CategoryController@show")->name("admin.categories.show");
        Route::get("/add", "CategoryController@create")->name("admin.categories.create");
        Route::post("/add", "CategoryController@store")->name("admin.categories.store");
        Route::get("/edit/{id}", "CategoryController@edit")->name("admin.categories.edit");
        Route::put("/edit/{id}", "CategoryController@update")->name("admin.categories.update");
        Route::get("/restore/{id}", "CategoryController@restore")->name("admin.categories.restore");
        Route::delete("/delete/{id}", "CategoryController@destory")->name("admin.categories.destroy");

        Route::group(["prefix" => "properties"], function () {
            Route::get("/", "AdminController@getCategoryProperties")->name("admin.properties");
            Route::get("/show/{id}", "CategoryPropertyController@show")->name("admin.categories.show");
            Route::get("/add", "CategoryPropertyController@create")->name("admin.properties.create");
            Route::post("/add", "CategoryPropertyController@store")->name("admin.properties.store");
            Route::get("/edit/{id}", "CategoryPropertyController@edit")->name("admin.properties.edit");
            Route::put("/edit/{id}", "CategoryPropertyController@update")->name("admin.properties.update");
            Route::get("/restore/{id}", "CategoryPropertyController@restore")->name("admin.properties.restore");
            Route::delete("/delete/{id}", "CategoryPropertyController@destory")->name("admin.properties.destroy");
        });
    });

    Route::group(["prefix" => "subcategories"], function () {
        Route::get("/", "AdminController@getSubcategories")->name("admin.subcategories");
        Route::get("/show/{id}", "SubcategoryController@show")->name("admin.subcategories.show");
        Route::get("/add", "SubcategoryController@create")->name("admin.subcategories.create");
        Route::post("/add", "SubcategoryController@store")->name("admin.subcategories.store");
        Route::get("/edit/{id}", "SubcategoryController@edit")->name("admin.subcategories.edit");
        Route::put("/edit/{id}", "SubcategoryController@update")->name("admin.subcategories.update");
        Route::get("/restore/{id}", "SubcategoryController@restore")->name("admin.subcategories.restore");
        Route::delete("/delete/{id}", "SubcategoryController@destory")->name("admin.subcategories.destroy");
    });

    Route::group(["prefix" => "things"], function () {
        Route::get("/", "AdminController@getThings")->name("admin.things");
        Route::get("/show/{id}", "ThingController@show")->name("admin.things.show");
        Route::get("/add", "ThingController@create")->name("admin.things.create");
        Route::post("/add", "ThingController@store")->name("admin.things.store");
        Route::get("/edit/{id}", "ThingController@edit")->name("admin.things.edit");
        Route::put("/edit/{id}", "ThingController@update")->name("admin.things.update");
        Route::get("/restore/{id}", "ThingController@restore")->name("admin.things.restore");
        Route::delete("/delete/{id}", "ThingController@destory")->name("admin.things.destroy");
    });

    Route::group(["prefix" => "users"], function () {
        Route::get("/", "AdminController@getUsers")->name("admin.users");
        Route::get("/show/{id}", "UserController@show")->name("admin.users.show");
        Route::get("/add", "UserController@create")->name("admin.users.create");
        Route::post("/add", "UserController@store")->name("admin.users.store");
        Route::get("/edit/{id}", "UserController@edit")->name("admin.users.edit");
        Route::put("/edit/{id}", "UserController@update")->name("admin.users.update");
        Route::get("/restore/{id}", "UserController@restore")->name("admin.users.restore");
        Route::delete("/delete/{id}", "UserController@destory")->name("admin.users.destroy");
    });


    Route::group(["prefix" => "transporters"], function () {
        Route::get("/", "AdminController@getTransporters")->name("admin.transporters");
        Route::get("/show/{id}", "TransporterController@show")->name("admin.transporters.show");
        Route::get("/add", "TransporterController@create")->name("admin.transporters.create");
        Route::post("/add", "TransporterController@store")->name("admin.transporters.store");
        Route::get("/edit/{id}", "TransporterController@edit")->name("admin.transporters.edit");
        Route::put("/edit/{id}", "TransporterController@update")->name("admin.transporters.update");
        Route::get("/restore/{id}", "TransporterController@restore")->name("admin.transporters.restore");
        Route::delete("/delete/{id}", "TransporterController@destory")->name("admin.transporters.destroy");
    });

    Route::group(["prefix" => "customers"], function () {
        Route::get("/", "AdminController@getCustomers")->name("admin.customers");
        Route::get("/show/{id}", "CustomerController@show")->name("admin.customers.show");
        Route::get("/add", "CustomerController@create")->name("admin.customers.create");
        Route::post("/add", "CustomerController@store")->name("admin.customers.store");
        Route::get("/edit/{id}", "CustomerController@edit")->name("admin.customers.edit");
        Route::put("/edit/{id}", "CustomerController@update")->name("admin.customers.update");
        Route::delete("/delete/{id}", "CustomerController@destory")->name("admin.customers.destroy");
    });

    Route::group(["prefix" => "reviews"], function () {
        Route::get("/", "AdminController@getReviews")->name("admin.reviews");
        Route::get("/show/{id}", "ReviewController@show")->name("admin.reviews.show");
        Route::get("/add", "ReviewController@create")->name("admin.reviews.create");
        Route::post("/add", "ReviewController@store")->name("admin.reviews.store");
        Route::get("/edit/{id}", "ReviewController@edit")->name("admin.reviews.edit");
        Route::put("/edit/{id}", "ReviewController@update")->name("admin.reviews.update");
        Route::get("/restore/{id}", "ReviewController@restore")->name("admin.reviews.restore");
        Route::delete("/delete/{id}", "ReviewController@destory")->name("admin.reviews.destroy");
    });

    Route::group(["prefix" => "vehicles"], function () {
        Route::get("/", "AdminController@getVehicles")->name("admin.vehicles");
        Route::get("/show/{id}", "VehicleController@show")->name("admin.vehicles.show");
        Route::get("/add", "VehicleController@create")->name("admin.vehicles.create");
        Route::post("/add", "VehicleController@store")->name("admin.vehicles.store");
        Route::get("/edit/{id}", "VehicleController@edit")->name("admin.vehicles.edit");
        Route::put("/edit/{id}", "VehicleController@update")->name("admin.vehicles.update");
        Route::get("/restore/{id}", "VehicleController@restore")->name("admin.vehicles.restore");
        Route::delete("/delete/{id}", "VehicleController@destory")->name("admin.vehicles.destroy");
    });

    Route::group(["prefix" => "verifications"], function () {
        Route::get("/", "AdminController@getVerificationApplications")->name("admin.verifications");
        Route::get("/show/{id}", "VerificationApplicationControllor@show")->name("admin.verifications.show");
        Route::get("/add", "VerificationApplicationControllor@create")->name("admin.verifications.create");
        Route::post("/add", "VerificationApplicationControllor@store")->name("admin.verifications.store");
        Route::get("/edit/{id}", "VerificationApplicationControllor@edit")->name("admin.verifications.edit");
        Route::put("/edit/{id}", "VerificationApplicationControllor@update")->name("admin.verifications.update");
        Route::get("/restore/{id}", "VerificationApplicationControllor@restore")->name("admin.verifications.restore");
        Route::delete("/delete/{id}", "VerificationApplicationControllor@destory")->name("admin.verifications.destroy");
    });

    Route::group(["prefix" => "roles"], function () {
        Route::get("/", "AdminController@getRoles")->name("admin.roles");
        Route::get("/show/{id}", "RoleController@show")->name("admin.roles.show");
    });

    Route::group(["prefix" => "permissions"], function () {
        Route::get("/", "AdminController@getPermissions")->name("admin.permissions");
        Route::get("/show/{id}", "PermissionController@show")->name("admin.permissions.show");
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

//Auth::routes();
Route::view("/404", "errors.404")->name("errors.404");

Route::view("/login", "auth.login")->name("login");
Route::view("/recovery-password", "auth.recovery")->name("recovery");
Route::post("/login", "Auth\LoginController@login");

Route::post('/register-customer', \Auth\RegisterController::class . '@registerCustomer')->name("register-customer");
Route::post('/register-customer-with-listing', \Auth\RegisterController::class . '@registerCustomerWithListing')->name("register-customer-with-listing");
Route::post('/register-transporter', \Auth\RegisterController::class . '@registerTransporter')->name("register-transporter");
Route::get('/logout', \Auth\LoginController::class . '@logout')->name("logout");

Route::post('/forgot-password', \Auth\ResetPasswordController::class . '@askForgotPassword')->middleware('guest')->name('password.email');

/*Auth::routes(['verify' => true]);*/



Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::group(["prefix" => "send"], function () {
    Route::post('/message', 'HomeController@sendMessage')
        ->name('send.message');
    Route::post('/voice', 'HomeController@sendVoice')
        ->name('send.voice');
});

Route::post('/reset-password', \Auth\ResetPasswordController::class . '@storeResetPassword')->middleware('guest')->name('password.update');


Route::resource('category', 'CategoryController');

Route::resource('subcategory', 'SubcategoryController');

Route::resource('transporter', 'TransporterController');

Route::resource('customer', 'CustomerController');

Route::resource('profile', 'ProfileController');


Route::get('/social/{name}', function ($name) {
    return Socialite::driver($name)->redirect();
});

Route::get('/auth/callback/{name}', function ($name) {
    $user = Socialite::driver($name)->user();

    // OAuth 2.0 providers...
    $token = $user->token;
    $refreshToken = $user->refreshToken;
    $expiresIn = $user->expiresIn;

    // All providers...
    $user->getId();
    $user->getNickname();
    $user->getName();
    $user->getEmail();
    $user->getAvatar();

    dd($user);
});

Route::group(['prefix' => 'v-admin'], function () {
    Voyager::routes();
});
