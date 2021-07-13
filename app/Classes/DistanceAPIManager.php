<?php


namespace App\Classes;


use App\Classes\Api\DistanceAPI;
use App\Classes\Api\iCarsAPI;
use App\Classes\Api\iDistanceAPI;
use App\Classes\Api\RioAPII;
use Illuminate\Support\Facades\App;

class DistanceAPIManager
{
    protected $distanceAPI = null;

    public function __construct()
    {
        $this->distanceAPI = new DistanceAPI();
    }

    public function getAPI(): iDistanceAPI
    {
        return $this->distanceAPI;
    }
}
