<?php

namespace App\Http\Controllers;


use App\Classes\Api\RioAPII;
use App\Classes\CarsAPIManager;
use App\Classes\CitiesAndCountriesAPIManager;
use App\Classes\DistanceAPIManager;
use App\Models\TypeOfObject;
use App\Models\TypeOfTransport;
use App\Vehicle;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{

    protected $cars = null;
    protected $citiesAndCountries = null;
    protected $distance = null;

    public function __construct()
    {
        $this->cars = new CarsAPIManager();
        $this->citiesAndCountries = new CitiesAndCountriesAPIManager();
        $this->distance = new DistanceAPIManager();
    }

    public function typeOfTransport()
    {
        return response()->json(TypeOfTransport::where("is_active", true)
            ->orderBy("position", "DESC")
            ->get()
        );
    }

    public function typeOfObject()
    {
        return response()->json(TypeOfObject::with(["category"])
            ->where("is_active", true)
            ->orderBy("position", "DESC")
            ->get()
        );
    }

    public function typeOfObjectByCategory($categoryId)
    {
        return response()->json(TypeOfObject::with(["category"])
            ->where("object_category_id", $categoryId)
            ->where("is_active", true)
            ->orderBy("position", "DESC")
            ->get()
        );
    }

    public function vehicles()
    {
        return response()->json(Vehicle::where("is_active", true)
            ->orderBy("position", "DESC")
            ->get()
        );
    }

    public function latestTransactions()
    {

    }

    public function topMovers()
    {

    }

    public function carsCategories()
    {
        return response()->json($this->cars->getAPI()->getCategories());
    }

    public function carsMarks($id)
    {
        return response()->json($this->cars->getAPI()->getMarks($id));
    }


    public function carsModels($categoryId, $markId)
    {
        return response()->json($this->cars->getAPI()->getModels($categoryId, $markId));
    }

    public function getCountries()
    {
        return response()->json($this->citiesAndCountries->getAPI()->countries());
    }

    public function getCities($country)
    {
        return response()->json($this->citiesAndCountries->getAPI()->cities($country));
    }

    public function getMathDist(float $fA, float $lA, float $fB, float $lB)
    {
        return response()->json($this->distance->getAPI()->mathDist($fA, $lA, $fB, $lB));
    }

    public function getApiDist(float $fA, float $lA, float $fB, float $lB)
    {
        return response()->json($this->distance->getAPI()->apiDist($fA, $lA, $fB, $lB));
    }

    public function getRoute(float $fA, float $lA, float $fB, float $lB)
    {
        return response()->json($this->distance->getAPI()->route($fA, $lA, $fB, $lB));
    }

    public function getCoords(string $address)
    {
        return response()->json($this->distance->getAPI()->coords($address));
    }


}
