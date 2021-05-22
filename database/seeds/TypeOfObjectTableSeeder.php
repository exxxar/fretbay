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
        TypeOfObject::truncate();


        //Entrance
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
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Pedestal table",
                "ru"=>"Pedestal table",
                'fr'=>"Pedestal table",
            ],
            "img" => "/images/common/icons/volume/5h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Console",
                "ru"=>"Console",
                'fr'=>"Console",
            ],
            "img" => "/images/common/icons/volume/6h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Chair",
                "ru"=>"Chair",
                'fr'=>"Chair",
            ],
            "img" => "/images/common/icons/volume/30h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Moving box",
                "ru"=>"Moving box",
                'fr'=>"Moving box",
            ],
            "img" => "/images/common/icons/volume/8h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);



            //Bathroom
        TypeOfObject::create([
            "title" => [
                "en"=>"Column cabinet",
                "ru"=>"Column cabinet",
                'fr'=>"Column cabinet",
            ],
            "img" => "/images/common/icons/volume/9h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);


        TypeOfObject::create([
            "title" => [
                "en"=>"Low cabinet",
                "ru"=>"Low cabinet",
                'fr'=>"Low cabinet",
            ],
            "img" => "/images/common/icons/volume/10h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);


        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Laundry basket",
                "ru"=>"Laundry basket",
                'fr'=>"Laundry basket",
            ],
            "img" => "/images/common/icons/volume/11h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);

        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Moving box",
                "ru"=>"Moving box",
                'fr'=>"Moving box",
            ],
            "img" => "/images/common/icons/volume/12h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Washing machine",
                "ru"=>"Washing machine",
                'fr'=>"Washing machine",
            ],
            "img" => "/images/common/icons/volume/13h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Dryer",
                "ru"=>"Dryer",
                'fr'=>"Dryer",
            ],
            "img" => "/images/common/icons/volume/14h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Medicine closet",
                "ru"=>"Medicine closet",
                'fr'=>"Medicine closet",
            ],
            "img" => "/images/common/icons/volume/15h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Wall shelf",
                "ru"=>"Wall shelf",
                'fr'=>"Wall shelf",
            ],
            "img" => "/images/common/icons/volume/16h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);
    }
}
