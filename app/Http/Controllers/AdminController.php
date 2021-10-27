<?php

namespace App\Http\Controllers;

use App\Models\ObjectCategory;
use App\Models\CategoryProperty;
use App\Models\Listing;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Profile;
use App\Models\Review;
use App\Models\Role;
use App\Models\Subcategory;
use App\Models\Thing;
use App\Models\Vehicle;
use App\Models\VerificationApplication;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route("voyager.dashboard");
    }

    public function getOrders()
    {
        $orders = Order::paginate(50);

        $deleted = Order::withTrashed()->whereNotNull("deleted_at")->paginate(50);

        return view("admin.pages.orders.index", [
            "orders" => json_encode($orders),
            "deleted" => json_encode($deleted)
        ]);
    }

    public function getListings(Request $request)
    {
        $listings = Listing::paginate(50);

        $deleted = Listing::withTrashed()->whereNotNull("deleted_at")->paginate(50);

        return view("admin.pages.listings.index", [
            "listings" => json_encode($listings),
            "deleted" => json_encode($deleted)
        ]);
    }

    public function getCategories(Request $request)
    {
        $categories = ObjectCategory::paginate(50);

        $deleted = ObjectCategory::withTrashed()->whereNotNull("deleted_at")->paginate(50);

        return view("admin.pages.categories.index", [
            "categories" => json_encode($categories),
            "deleted" => json_encode($deleted)
        ]);
    }

    public function getCategoryProperties(Request $request)
    {
        $properties = CategoryProperty::paginate(50);

        return view("admin.pages.properties.index", [
            "properties" => json_encode($properties),
            "deleted" => json_encode([])
        ]);
    }

    public function getSubcategories(Request $request)
    {
        $subcategories = Subcategory::paginate(50);

        $deleted = Subcategory::withTrashed()->whereNotNull("deleted_at")->paginate(50);

        return view("admin.pages.subcategories.index", [
            "subcategories" => json_encode($subcategories),
            "deleted" => json_encode($deleted)
        ]);
    }

    public function getThings(Request $request)
    {
        $things = Thing::paginate(50);

        $deleted = Thing::withTrashed()->whereNotNull("deleted_at")->paginate(50);

        return view("admin.pages.things.index", [
            "things" => json_encode($things),
            "deleted" => json_encode($deleted)
        ]);
    }

    public function getTransporters(Request $request)
    {
        return view("admin.pages.transporters.index");
    }

    public function getCustomers(Request $request)
    {
        return view("admin.pages.customers.index");
    }

    public function getReviews(Request $request)
    {
        $reviews = Review::paginate(50);

        $deleted = Review::withTrashed()->whereNotNull("deleted_at")->paginate(50);

        return view("admin.pages.reviews.index", [
            "reviews" => json_encode($reviews),
            "deleted" => json_encode($deleted)
        ]);
    }

    public function getRoles(Request $request)
    {
        $roles = Role::paginate(50);

        return view("admin.pages.roles.index", [
            "roles" => json_encode($roles),
            "deleted" => json_encode([])
        ]);
    }

    public function getPermissions(Request $request)
    {
        $permissions = Permission::paginate(50);

        return view("admin.pages.permissions.index", [
            "permissions" => json_encode($permissions),
            "deleted" => json_encode([])
        ]);
    }

    public function getVehicles(Request $request)
    {
        $vehicles = Vehicle::paginate(50);

        return view("admin.pages.vehicles.index", [
            "vehicles" => json_encode($vehicles),
            "deleted" => json_encode([])
        ]);
    }

    public function getVerificationApplications(Request $request)
    {
        $verifications = VerificationApplication::paginate(50);

        return view("admin.pages.verifications.index", [
            "verifications" => json_encode($verifications),
            "deleted" => json_encode([])
        ]);
    }


    public function getUsers(Request $request)
    {
        $users = User::with(["profile"])->paginate(50);

        $deleted = User::withTrashed()->with(["profile"])->whereNotNull("deleted_at")->paginate(50);

        return view("admin.pages.users.index", [
            "users" => json_encode($users),
            "deleted" => json_encode($deleted)
        ]);
    }
}
