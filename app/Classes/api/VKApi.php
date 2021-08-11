<?php


namespace App\Classes\Api;


use Illuminate\Support\Facades\Log;
use VK\Client\Enums\VKLanguage;
use VK\Client\VKApiClient;

class VKApi implements iCitiesAndCountriesAPI
{

    protected $vk = null;

    public function __construct($lang = "en")
    {
        $this->vk = new VKApiClient('5.131', $lang);
    }

    public function countries(): array
    {

        return $this->vk->database()->getCountries(env("VK_SERVICE_KEY"),
            ["count" => 234, "need_all" => 1])["items"];

    }

    public function cities($country, $region=null, $query=''): array
    {
        $attributes = ["country_id" => $country, "need_all" => 0];
        if($region !== null && $region !== 'null' && $region !== '') {
            $attributes['region_id'] = $region;
        }
        if($query !== '' && $query !== 'null') {
            $attributes['q'] = $query;
        }
        return $this->vk->database()->getCities(env("VK_SERVICE_KEY"),
            $attributes
        )["items"];
    }

    public function regions($country): array
    {
        return $this->vk->database()->getRegions(env("VK_SERVICE_KEY"),
            ["country_id" => $country]
        )["items"];
    }
}
