<?php


namespace App\Classes\Api;


interface iCitiesAndCountriesAPI
{

    public function countries(): array;

    public function cities($country, $region=null, $query=''): array;

    public function regions($country): array;

}
