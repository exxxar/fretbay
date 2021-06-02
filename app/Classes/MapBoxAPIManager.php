<?php


namespace App\Classes;


use App\Classes\Api\MapBoxAPI;
use Illuminate\Support\Facades\App;

class MapBoxAPIManager
{
    protected $mapBoxAPI = [];

    public function getAPI()
    {
        return new MapBoxAPI();
    }

}
