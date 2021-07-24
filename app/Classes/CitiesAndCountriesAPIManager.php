<?php


namespace App\Classes;


use App\Classes\Api\iCarsAPI;
use App\Classes\Api\iCitiesAndAndCountriesAPI;
use App\Classes\api\iCitiesAndCountriesAPI;
use App\Classes\Api\RioApi;
use App\Classes\api\VKApi;
use Illuminate\Support\Facades\App;

class CitiesAndCountriesAPIManager
{

    public function getAPI(): iCitiesAndCountriesAPI
    {
        return new VKApi(App::getLocale());
    }
}
