<?php


namespace App\Classes\api;


interface iDistanceAPI
{
    public function mathDist(float $fA, float $lA, float $fB, float $lB): float;

    public function apiDist(float $fA, float $lA, float $fB, float $lB): float;

    public function route(float $fA, float $lA, float $fB, float $lB): array;

    public function coords(string $address): object;

}
