<?php


namespace App\Classes\Api;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class iCitiesAndAndCountriesAPI implements iCitiesAndCountriesAPI
{

    const LOCAL_PATH = "countries-list.json";
    const URL = "https://countriesnow.space/api/v0.1/countries";

    private $countries = [];

    public function __construct()
    {
        if (Storage::exists(self::LOCAL_PATH))
            $this->countries = json_decode(Storage::get(self::LOCAL_PATH));
        else {

            $this->countries = $this->get(self::URL);

            Storage::put(self::LOCAL_PATH, json_encode($this->countries));
        }

    }

    private function get($endpoint)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint);

        return json_decode($response->getBody(), true)["data"];
    }


    public function countries(): array
    {
        $tmp = [];

        foreach ($this->countries as $country) {
            array_push($tmp, ((object)$country)->country);
        }

        return $tmp;
    }

    public function cities($country): array
    {

        foreach ($this->countries as $item) {

            if (strtolower($item->country) == strtolower($country)) {
                return $item->cities;
            }

        }

        return [];

    }
}
