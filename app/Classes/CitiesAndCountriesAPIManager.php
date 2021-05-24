<?php


namespace App\Classes;


use App\Classes\Api\iCarsAPI;
use App\Classes\Api\iCitiesAndAndCountriesAPI;
use App\Classes\api\iCitiesAndCountriesAPI;
use App\Classes\Api\RioAPII;
use App\Classes\api\VKApiI;
use Illuminate\Support\Facades\App;

class CitiesAndCountriesAPIManager
{

    public function getAPI(): iCitiesAndCountriesAPI
    {
        return new VKApiI(App::getLocale());
    }
}
