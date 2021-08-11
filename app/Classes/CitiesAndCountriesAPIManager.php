<?php


namespace App\Classes;


use App\Classes\Api\iCarsAPI;
use App\Classes\Api\iCitiesAndAndCountriesAPI;
use App\Classes\api\iCitiesAndCountriesAPI;
use App\Classes\Api\RioApi;
use App\Classes\api\VKApi;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CitiesAndCountriesAPIManager
{

    public function getAPI(): iCitiesAndCountriesAPI
    {
        $locale1 = App::getLocale();
        $locale = Session::get('lang');
        $lang = 'en';
        if($locale == null) {
            if($locale1 !== null) {
                $lang = $locale1;
            }
        }
        else {
            $lang = $locale;
        }
        return new VKApi($lang);
    }
}
