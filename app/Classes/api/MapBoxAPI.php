<?php


namespace App\Classes\Api;


class MapBoxAPI
{

    const GEO_URL = "https://api.mapbox.com/geocoding/v5/mapbox.places";
    const DIRECTION_URL = "https://api.mapbox.com/directions-matrix/v1/mapbox/driving/%s,%s;%s,%s?approaches=curb;curb&access_token=%s";

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

    public function getAddress($term, $lang = 'en'): array
    {
        $addresses = (array)$this->get(
            self::GEO_URL . "/$term.json?language=$lang&access_token=" . $this->apiKey
        );
        return $addresses['features'];
    }

    public function getDistance($x1, $y1, $x2, $y2): int
    {

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('GET',
                "https://api.mapbox.com/directions-matrix/v1/mapbox/driving/$x1,$y1;$x2,$y2?approaches=curb;curb&access_token=" . $this->apiKey

            );
        }catch (\Exception $e){
            return 0;
        }

        if($response->getStatusCode()!==200)
            return 0;

        $distances = json_decode($response->getBody(), true);

        $tmp_sum = 0;
        if (isset($distances["destinations"]))
            foreach ($distances["destinations"] as $dist)
                $tmp_sum += $dist["distance"];

        return $tmp_sum;
    }

}
