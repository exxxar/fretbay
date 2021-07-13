<?php

namespace App\Http\Controllers;


use App\Classes\Api\MapBoxAPI;
use App\Classes\Api\RioApi;
use App\Classes\CarsAPIManager;
use App\Classes\CitiesAndCountriesAPIManager;
use App\Classes\DistanceAPIManager;
use App\Classes\MapBoxAPIManager;

use App\Models\ObjectCategory;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{

    protected $cars = null;
    protected $citiesAndCountries = null;
    protected $distance = null;
    protected $mapBox = null;

    public function __construct()
    {
        $this->cars = new CarsAPIManager();
        $this->citiesAndCountries = new CitiesAndCountriesAPIManager();
        $this->distance = new DistanceAPIManager();
        $this->mapBox = new MapBoxAPIManager();
    }


    public function latestTransactions()
    {

    }

    public function topMovers()
    {

    }

    public function volumeCategories(){
        $categories = ObjectCategory::with(['subcategories', 'things', 'properties'])
            ->where('additional_menu_title', 'volume')
            ->get();
        return response()->json([
            'categories' => $categories
        ]);
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
    public function getAddress(string $address, string $lang)
    {
        return response()->json($this->mapBox->getAPI()->getAddress($address, $lang));
    }

}
