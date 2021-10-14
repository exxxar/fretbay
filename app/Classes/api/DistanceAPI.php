<?php


namespace App\Classes\Api;

use Yandex\Geocode\Facades\YandexGeocodeFacade;

class DistanceAPI implements iDistanceAPI
{
    protected $earth_radius = 6372795;


    public function mathDist(float $fA, float $lA, float $fB, float $lB): float
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

        return $dist;

    }


    public function apiDist(float $fA, float $lA, float $fB, float $lB): float
    {
        $content = null;
        try {
            $content = file_get_contents("http://router.project-osrm.org/trip/v1/driving/$fA,$lA;$fB,$lB?steps=false&geometries=geojson");
        } catch (\Exception $e) {
        }

        $sum = 0;
        $waypoints = json_decode($content)->waypoints;

        foreach ($waypoints as $item)
            $sum += ((object)$item)->distance;

        return $sum;

    }


    public function route(float $fA,float $lA,float $fB,float $lB): array
    {
        $content = null;
        try {
            $content = file_get_contents("http://router.project-osrm.org/trip/v1/driving/$fA,$lA;$fB,$lB?steps=true&geometries=geojson");
        } catch (\Exception $e) {


        }
        return json_decode($content)->trips;

    }

    public function coords(string $address):object
    {
        $data = null;
        try {
            $data = YandexGeocodeFacade::setQuery($address ?? '')->load();
            $data = $data->getResponse();
        } catch (\Exception $e) {

        }

        return (object)[
            "latitude" => !is_null($data) ? $data->getLatitude() : 0,
            "longitude" => !is_null($data) ? $data->getLongitude() : 0
        ];
    }
}
