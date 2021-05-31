<?php


namespace App\Classes\Api;


interface iCarsAPI
{
    public function getCategories(): array;

    public function getBodyStyles(int $categoryId): array;

    public function getMarks(int $categoryId): array;

    public function getModels(int $categoryId, int $markId): array;

    public function getGearboxes(int $categoryId): array;

    public function getDriverType(int $categoryId): array;

    public function getFuelType(): array;

    public function getAutoOptions(int $categoryId): array;
}
