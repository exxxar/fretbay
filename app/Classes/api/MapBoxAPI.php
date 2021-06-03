<?php


namespace App\Classes\Api;


class MapBoxAPI
{

    const URL = "https://api.mapbox.com/geocoding/v5/mapbox.places";

    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env("MAPBOX_API_KEY");
    }

    private function get($endpoint)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint, ['query' => [
            'access_token' => $this->apiKey
        ]]);

        return json_decode($response->getBody(), true);
    }

    public function getAddress($term, $lang='en'):array
    {
        $addresses = (array)$this->get(
            self::URL."/$term.json?language=$lang&access_token=".$this->apiKey
        );
        return $addresses['features'];
    }

}
