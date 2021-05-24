<?php


namespace App\Classes\Api;


interface iCitiesAndCountriesAPI
{

    public function countries(): array;

    public function cities($country): array;

}
