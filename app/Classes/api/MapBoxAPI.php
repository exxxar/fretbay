<?php


namespace App\Classes\Api;


class MapBoxAPI
{

    protected $earth_radius = 6372795;

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


    public function getMathDistance($fA, $lA, $fB, $lB)
    {
        // перевести координаты в радианы
        $lat1 = $fA * M_PI / 180;
        $lat2 = $fB * M_PI / 180;
        $long1 = $lA * M_PI / 180;
        $long2 = $lB * M_PI / 180;

// косинусы и синусы широт и разницы долгот
        $cl1 = cos($lat1);
        $cl2 = cos($lat2);
        $sl1 = sin($lat1);
        $sl2 = sin($lat2);
        $delta = $long2 - $long1;
        $cdelta = cos($delta);
        $sdelta = sin($delta);

// вычисления длины большого круга
        $y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
        $x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;

//
        $ad = atan2($y, $x);
        $dist = $ad * $this->earth_radius;

        return round($dist / 1000);

    }

    public function getDistanceOSM($x1, $y1, $x2, $y2): int
    {


        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('GET',
                "https://router.project-osrm.org/route/v1/driving/$x1,$y1;$x2,$y2?steps=false&geometries=geojson"

            );
        } catch (\Exception $e) {
            return 0;
        }

        if ($response->getStatusCode() !== 200)
            return 0;

        $distances = json_decode($response->getBody(), true);

        $tmp_sum = 0;
        if (isset($distances["routes"][0]["distance"]))
            $tmp_sum = $distances["routes"][0]["distance"];

        return $tmp_sum;
    }

    public function getDistance($x1, $y1, $x2, $y2): int
    {

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('GET',
                "https://api.mapbox.com/directions-matrix/v1/mapbox/driving/$x1,$y1;$x2,$y2?approaches=curb;curb&access_token=" . $this->apiKey

            );
        } catch (\Exception $e) {
            return 0;
        }

        if ($response->getStatusCode() !== 200)
            return 0;

        $distances = json_decode($response->getBody(), true);

        $tmp_sum = 0;
        if (isset($distances["destinations"]))
            foreach ($distances["destinations"] as $dist)
                $tmp_sum += $dist["distance"];

        return $tmp_sum;
    }

    public function getRegions($country)
    {
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('GET',
                "https://api.mapbox.com/directions-matrix/v1/mapbox/driving/$x1,$y1;$x2,$y2?approaches=curb;curb&access_token=" . $this->apiKey

            );
        } catch (\Exception $e) {
            return 0;
        }

        if ($response->getStatusCode() !== 200)
            return 0;

        $distances = json_decode($response->getBody(), true);

        $tmp_sum = 0;
        if (isset($distances["destinations"]))
            foreach ($distances["destinations"] as $dist)
                $tmp_sum += $dist["distance"];

        return $tmp_sum;
    }


    public function route(float $fA,float $lA,float $fB,float $lB)
    {
        $content = null;
        try {
            $content = file_get_contents("http://router.project-osrm.org/trip/v1/driving/$fA,$lA;$fB,$lB?steps=true&geometries=geojson");
        } catch (\Exception $e) {


        }
        return json_decode($content)->trips;

    }

}
