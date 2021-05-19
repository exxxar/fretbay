<?php

use App\Models\ObjectCategory;
use App\Models\TypeOfObject;
use Illuminate\Database\Seeder;

class TypeOfObjectTableSeeder extends Seeder
{

    public function getCategoryIdByTitle($title)
    {
        //todo: CHECK change because 'title' is array
        return ObjectCategory::where("title->en", $title)->first()->id;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        TypeOfObject::truncate();

        TypeOfObject::create([
            "title" => [
                "en"=>"TV stand",
                "ru"=>"TV stand",
                'fr'=>"TV stand",
            ],
            "img" => "/images/common/icons/volume/132h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);


        TypeOfObject::create([
            "title" => [
                "en"=>"Mirror",
                "ru"=>"Mirror",
                'fr'=>"Mirror",
            ],
            "img" => "/images/common/icons/volume/2h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);


        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Shoe cabinet",
                "ru"=>"Shoe cabinet",
                'fr'=>"Shoe cabinet",
            ],
            "img" => "/images/common/icons/volume/3h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);

        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Carpet",
                "ru"=>"Carpet",
                'fr'=>"Carpet",
            ],
            "img" => "/images/common/icons/volume/3h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);


    }
}
