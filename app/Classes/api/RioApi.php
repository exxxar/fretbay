<?php


namespace App\Classes\Api;


class RioApi implements iCarsAPI
{

    const URL = "https://developers.ria.com";

    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env("RIO_API_KEY");
    }

    private function get($endpoint)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint, ['query' => [
            'api_key' => $this->apiKey
        ]]);

        return json_decode($response->getBody(), true);
    }

    public function getCategories():array
    {

        $categories = (array)$this->get(
            self::URL."/auto/categories"
        );

        $tmp = [];

        foreach ($categories as $item){
            array_push($tmp,(object)[
                "name"=> __("cars-categories.type.".$item["value"]),
                "value"=>$item["value"]
            ]);
        }
        return $tmp;

    }

    public function getBodyStyles($id = 1):array
    {

        return (array)$this->get(
            self::URL."/auto/categories/$id/bodystyles"
        );

    }

    public function getMarks($id = 1):array
    {
        return (array)$this->get(
            self::URL."/auto/categories/$id/marks"
        );
    }

    public function getModels($id = 1, $mark = 1):array
    {
        return (array)$this->get(
            self::URL."/auto/categories/$id/marks/$mark/models"
        );
    }

    public function getGearboxes($id = 1):array
    {
        return (array)$this->get(
            self::URL."/auto/categories/$id/gearboxes"
        );
    }

    public function getDriverType($id = 1):array
    {
        return (array)$this->get(
            self::URL."/auto/categories/$id/driverTypes"
        );
    }

    public function getFuelType():array
    {
        return (array)$this->get(
            self::URL."/auto/type"
        );
    }

    public function getAutoOptions($id = 1):array
    {
        return (array)$this->get(
            self::URL."/auto/categories/$id/auto_options"
        );
    }
}
