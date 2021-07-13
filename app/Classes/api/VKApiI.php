<?php


namespace App\Classes\Api;


use VK\Client\Enums\VKLanguage;
use VK\Client\VKApiClient;

class VKApiI implements iCitiesAndCountriesAPI
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

    public function cities($country): array
    {
        return $this->vk->database()->getCities(env("VK_SERVICE_KEY"),
            ["country_id" => $country, "need_all" => 0]
        )["items"];
    }
}
