<?php


namespace App\Classes;


use App\Classes\Api\iCarsAPI;
use App\Classes\Api\RioApi;
use Illuminate\Support\Facades\App;

class CarsAPIManager
{
    protected $carsAPI = [];

    public function __construct()
    {
        $this->carsAPI = [
            "en" => new RioApi()
        ];
    }

    public function getAPI(): iCarsAPI
    {
        $localization = App::getLocale();

        return isset($this->carsAPI[$localization]) ? $this->carsAPI[$localization] : $this->carsAPI["en"];
    }

}
