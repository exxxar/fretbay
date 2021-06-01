<?php

use App\Category;
use App\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{

    public function getCategoryIdByTitle($title)
    {
        return Category::where("title->en", $title)->first()->id ?? null;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //Entrance
        Subcategory::create([
            "title" => [
                "en" => "TV stand",
                "ru" => "TV stand",
                'fr' => "TV stand",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/132h.svg",
            "category_id" => $this->getCategoryIdByTitle("Entrance")
            , 'position' => 0,
            'is_active' => true]);


        Subcategory::create([
            "title" => [
                "en" => "Mirror",
                "ru" => "Mirror",
                'fr' => "Mirror",
            ],
            "volume"=> 0.1,
            "image" => "/images/common/icons/volume/2h.svg",
            "category_id" => $this->getCategoryIdByTitle("Entrance")
            , 'position' => 0,
            'is_active' => true]);


        Subcategory::create([
            "title" =>
                [
                    "en" => "Shoe cabinet",
                    "ru" => "Shoe cabinet",
                    'fr' => "Shoe cabinet",
                ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/3h.svg",
            "category_id" => $this->getCategoryIdByTitle("Entrance")
            , 'position' => 0,
            'is_active' => true]);

        Subcategory::create([
            "title" =>
                [
                    "en" => "Carpet",
                    "ru" => "Carpet",
                    'fr' => "Carpet",
                ],
            "volume"=> 0.2,
            "image" => "/images/common/icons/volume/3h.svg",
            "category_id" => $this->getCategoryIdByTitle("Entrance")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Pedestal table",
                    "ru" => "Pedestal table",
                    'fr' => "Pedestal table",
                ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/5h.svg",
            "category_id" => $this->getCategoryIdByTitle("Entrance")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Console",
                    "ru" => "Console",
                    'fr' => "Console",
                ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/6h.svg",
            "category_id" => $this->getCategoryIdByTitle("Entrance")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Chair",
                    "ru" => "Chair",
                    'fr' => "Chair",
                ],
            "volume"=> 0.25,   
            "image" => "/images/common/icons/volume/30h.svg",
            "category_id" => $this->getCategoryIdByTitle("Entrance")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Moving box",
                    "ru" => "Moving box",
                    'fr' => "Moving box",
                ],
            "volume"=> 0.1,
            "image" => "/images/common/icons/volume/8h.svg",
            "category_id" => $this->getCategoryIdByTitle("Entrance")
            , 'position' => 0,
            'is_active' => true]);


        //Bathroom
        Subcategory::create([
            "title" => [
                "en" => "Column cabinet",
                "ru" => "Column cabinet",
                'fr' => "Column cabinet",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/9h.svg",
            "category_id" => $this->getCategoryIdByTitle("Bathroom")
            , 'position' => 0,
            'is_active' => true]);


        Subcategory::create([
            "title" => [
                "en" => "Low cabinet",
                "ru" => "Low cabinet",
                'fr' => "Low cabinet",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/10h.svg",
            "category_id" => $this->getCategoryIdByTitle("Bathroom")
            , 'position' => 0,
            'is_active' => true]);


        Subcategory::create([
            "title" =>
                [
                    "en" => "Laundry basket",
                    "ru" => "Laundry basket",
                    'fr' => "Laundry basket",
                ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/11h.svg",
            "category_id" => $this->getCategoryIdByTitle("Bathroom")
            , 'position' => 0,
            'is_active' => true]);

        Subcategory::create([
            "title" =>
                [
                    "en" => "Moving box",
                    "ru" => "Moving box",
                    'fr' => "Moving box",
                ],
            "volume"=> 0.1,
            "image" => "/images/common/icons/volume/12h.svg",
            "category_id" => $this->getCategoryIdByTitle("Bathroom")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Washing machine",
                    "ru" => "Washing machine",
                    'fr' => "Washing machine",
                ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/13h.svg",
            "category_id" => $this->getCategoryIdByTitle("Bathroom")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Dryer",
                    "ru" => "Dryer",
                    'fr' => "Dryer",
                ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/14h.svg",
            "category_id" => $this->getCategoryIdByTitle("Bathroom")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Medicine closet",
                    "ru" => "Medicine closet",
                    'fr' => "Medicine closet",
                ],
            "volume"=> 0.03,
            "image" => "/images/common/icons/volume/15h.svg",
            "category_id" => $this->getCategoryIdByTitle("Bathroom")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Wall shelf",
                    "ru" => "Wall shelf",
                    'fr' => "Wall shelf",
                ],
                "volume"=> 0.25,
            "image" => "/images/common/icons/volume/16h.svg",
            "category_id" => $this->getCategoryIdByTitle("Bathroom")
            , 'position' => 0,
            'is_active' => true]);


        //Living room
        Subcategory::create([
            "title" => [
                "en" => "Moving box",
                "ru" => "Moving box",
                'fr' => "Moving box",
            ],
            "volume"=> 0.1,
            "image" => "/images/common/icons/volume/17h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);


        Subcategory::create([
            "title" => [
                "en" => "Office desk",
                "ru" => "Office desk",
                'fr' => "Office desk",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/18h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);


        Subcategory::create([
            "title" =>
                [
                    "en" => "2-seater sofa",
                    "ru" => "2-seater sofa",
                    'fr' => "2-seater sofa",
                ],
                "volume"=> 2.0,
            "image" => "/images/common/icons/volume/29h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);

        Subcategory::create([
            "title" =>
                [
                    "en" => "Chair",
                    "ru" => "Chair",
                    'fr' => "Chair",
                ],
                "volume"=> 0.25,
            "image" => "/images/common/icons/volume/30h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Armchair",
                    "ru" => "Armchair",
                    'fr' => "Armchair",
                ],
                "volume"=> 0.75,
            "image" => "/images/common/icons/volume/19h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Living",
                    "ru" => "Living",
                    'fr' => "Living",
                ],
                "volume"=> 0.5,
            "image" => "/images/common/icons/volume/67h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "HiFi system",
                    "ru" => "HiFi system",
                    'fr' => "HiFi system",
                ],
                "volume"=> 0.2,
            "image" => "/images/common/icons/volume/20h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Secretary desk",
                    "ru" => "Secretary desk",
                    'fr' => "Secretary desk",
                ],
                "volume"=> 1.0,
            "image" => "/images/common/icons/volume/32h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);

        Subcategory::create([
            "title" => [
                "en" => "Coffee table",
                "ru" => "Coffee table",
                'fr' => "Coffee table",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/21h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);


        Subcategory::create([
            "title" => [
                "en" => "Sofa bed",
                "ru" => "Sofa bed",
                'fr' => "Sofa bed",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/33h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);


        Subcategory::create([
            "title" =>
                [
                    "en" => "3-seater sofa",
                    "ru" => "3-seater sofa",
                    'fr' => "3-seater sofa",
                ],
                "volume"=> 2.5,
            "image" => "/images/common/icons/volume/22h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);

        Subcategory::create([
            "title" =>
                [
                    "en" => "Corner sofa",
                    "ru" => "Corner sofa",
                    'fr' => "Corner sofa",
                ],
                "volume"=> 3.0,
            "image" => "/images/common/icons/volume/34h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "TV",
                    "ru" => "TV",
                    'fr' => "TV",
                ],
                "volume"=> 0.2,
            "image" => "/images/common/icons/volume/23h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "TV+Furniture",
                    "ru" => "TV+Furniture",
                    'fr' => "TV+Furniture",
                ],
                "volume"=> 0.5,
            "image" => "/images/common/icons/volume/35h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Library",
                    "ru" => "Library",
                    'fr' => "Library",
                ],
                "volume"=> 1.0,
            "image" => "/images/common/icons/volume/24h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Showcase",
                    "ru" => "Showcase",
                    'fr' => "Showcase",
                ],
                "volume"=> 1.0,
            "image" => "/images/common/icons/volume/36h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Floor lamp",
                    "ru" => "Floor lamp",
                    'fr' => "Floor lamp",
                ],
                
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/25h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Trunk with drawers",
                    "ru" => "Trunk with drawers",
                    'fr' => "Trunk with drawers",
                ],
                
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/37h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Lightning (Chandelier)",
                    "ru" => "Lightning (Chandelier)",
                    'fr' => "Lightning (Chandelier)",
                ],
            "volume"=> 0.3,
            "image" => "/images/common/icons/volume/26h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Lightning (Bedside lamp)",
                    "ru" => "Lightning (Bedside lamp)",
                    'fr' => "Lightning (Bedside lamp)",
                ],
                "volume"=> 0.1,
            "image" => "/images/common/icons/volume/27h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Lightning (Floor lamp)",
                    "ru" => "Lightning (Floor lamp)",
                    'fr' => "Lightning (Floor lamp)",
                ],
            "volume"=> 0.3,
            "image" => "/images/common/icons/volume/28h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Pouf",
                    "ru" => "Pouf",
                    'fr' => "Pouf",
                ],
            "volume"=> 0.2,
            "image" => "/images/common/icons/volume/38h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Bolster/side table",
                    "ru" => "Bolster/side table",
                    'fr' => "Bolster/side table",
                ],
            "volume"=> 0.3,
            "image" => "/images/common/icons/volume/39h.svg",
            "category_id" => $this->getCategoryIdByTitle("Living room")
            , 'position' => 0,
            'is_active' => true]);


        //Kitchen
        Subcategory::create([
            "title" => [
                "en" => "Buffet",
                "ru" => "Buffet",
                'fr' => "Buffet",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/66h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "High element",
                "ru" => "High element",
                'fr' => "High element",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/50h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Low element",
                "ru" => "Low element",
                'fr' => "Low element",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/41h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Chair",
                "ru" => "Chair",
                'fr' => "Chair",
            ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/51h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Table",
                "ru" => "Table",
                'fr' => "Table",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/10h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Stool",
                "ru" => "Stool",
                'fr' => "Stool",
            ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/52h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Cooker",
                "ru" => "Cooker",
                'fr' => "Cooker",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/43h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Fridge",
                "ru" => "Fridge",
                'fr' => "Fridge",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/53h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Dishwasher",
                "ru" => "Dishwasher",
                'fr' => "Dishwasher",
            ],
            
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/44h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Oven",
                "ru" => "Oven",
                'fr' => "Oven",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/54h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Baby chair",
                "ru" => "Baby chair",
                'fr' => "Baby chair",
            ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/45h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Cooking plate",
                "ru" => "Cooking plate",
                'fr' => "Cooking plate",
            ],
            "volume"=> 0.1,
            "image" => "/images/common/icons/volume/55h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Microwave",
                "ru" => "Microwave",
                'fr' => "Microwave",
            ],
            "volume"=> 0.2,
            "image" => "/images/common/icons/volume/46h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Freezer",
                "ru" => "Freezer",
                'fr' => "Freezer",
            ],
            
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/56h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Washing machine",
                "ru" => "Washing machine",
                'fr' => "Washing machine",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/57h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bar/Counter",
                "ru" => "Bar/Counter",
                'fr' => "Bar/Counter",
            ],
            "volume"=> 1.7,
            "image" => "/images/common/icons/volume/48h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Refrigerator(Standard)",
                "ru" => "Refrigerator(Standard)",
                'fr' => "Refrigerator(Standard)",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/57h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Refrigerator(Top)",
                "ru" => "Refrigerator(Top)",
                'fr' => "Refrigerator(Top)",
            ],
            "volume"=> 0.6,
            "image" => "/images/common/icons/volume/58h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Refrigerator(American)",
                "ru" => "Refrigerator(American)",
                'fr' => "Refrigerator(American)",
            ],
            "volume"=> 1.3,
            "image" => "/images/common/icons/volume/59h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bench",
                "ru" => "Bench",
                'fr' => "Bench",
            ],
            "volume"=> 0.7,
            "image" => "/images/common/icons/volume/49h.svg",
            "category_id" => $this->getCategoryIdByTitle("Kitchen")
            , 'position' => 0,
            'is_active' => true]);


        //Dining room
        Subcategory::create([
            "title" => [
                "en" => "2-bodied buffet",
                "ru" => "2-bodied buffet",
                'fr' => "2-bodied buffet",
            ],
            "volume"=> 3.0,
            "image" => "/images/common/icons/volume/60h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Low buffet",
                "ru" => "Low buffet",
                'fr' => "Low buffet",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/66h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Service",
                "ru" => "Service",
                'fr' => "Service",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/61h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Living",
                "ru" => "Living",
                'fr' => "Living",
            ],
            "volume"=> 2.5,
            "image" => "/images/common/icons/volume/67h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Chair",
                "ru" => "Chair",
                'fr' => "Chair",
            ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/30h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Table",
                "ru" => "Table",
                'fr' => "Table",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/10h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Pantry cabinet",
                "ru" => "Pantry cabinet",
                'fr' => "Pantry cabinet",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/63h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Pedestal table",
                "ru" => "Pedestal table",
                'fr' => "Pedestal table",
            ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/69h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Dresser",
                "ru" => "Dresser",
                'fr' => "Dresser",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/64h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Armchair",
                "ru" => "Armchair",
                'fr' => "Armchair",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/70h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Moving box",
                "ru" => "Moving box",
                'fr' => "Moving box",
            ],
            "volume"=> 0.1,
            "image" => "/images/common/icons/volume/65h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Grandfather clock",
                "ru" => "Grandfather clock",
                'fr' => "Grandfather clock",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/71h.svg",
            "category_id" => $this->getCategoryIdByTitle("Dining room")
            , 'position' => 0,
            'is_active' => true]);


        //Chamber
        Subcategory::create([
            "title" => [
                "en" => "Chair",
                "ru" => "Chair",
                'fr' => "Chair",
            ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/72h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Chest of drawers",
                "ru" => "Chest of drawers",
                'fr' => "Chest of drawers",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/82h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Armchair",
                "ru" => "Armchair",
                'fr' => "Armchair",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/73h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Single bed",
                "ru" => "Single bed",
                'fr' => "Single bed",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/83h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bed(double)",
                "ru" => "Bed(double)",
                'fr' => "Bed(double)",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/74h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bedside",
                "ru" => "Bedside",
                'fr' => "Bedside",
            ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/84h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bunk bed",
                "ru" => "Bunk bed",
                'fr' => "Bunk bed",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/75h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Baby bed",
                "ru" => "Baby bed",
                'fr' => "Baby bed",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/85h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Wardrobe 2 doors",
                "ru" => "Wardrobe 2 doors",
                'fr' => "Wardrobe 2 doors",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/76h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "3-doored wardrobe",
                "ru" => "3-doored wardrobe",
                'fr' => "3-doored wardrobe",
            ],
            
            "volume"=> 2.5,
            "image" => "/images/common/icons/volume/86h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Toy chest",
                "ru" => "Toy chest",
                'fr' => "Toy chest",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/77h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Changing table",
                "ru" => "Changing table",
                'fr' => "Changing table",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/87h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Moving box",
                "ru" => "Moving box",
                'fr' => "Moving box",
            ],
            "volume"=> 0.1,
            "image" => "/images/common/icons/volume/78h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Dressing table",
                "ru" => "Dressing table",
                'fr' => "Dressing table",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/79h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Dressing",
                "ru" => "Dressing",
                'fr' => "Dressing",
            ],
            "volume"=> 2.5,
            "image" => "/images/common/icons/volume/80h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Office chair",
                "ru" => "Office chair",
                'fr' => "Office chair",
            ],
            "volume"=> 0.3,
            "image" => "/images/common/icons/volume/81h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Trunk/canteen",
                "ru" => "Trunk/canteen",
                'fr' => "Trunk/canteen",
            ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/88h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Pouf,footrest",
                "ru" => "Pouf,footrest",
                'fr' => "Pouf,footrest",
            ],
            "volume"=> 0.2,
            "image" => "/images/common/icons/volume/89h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Wardrobe box",
                "ru" => "Wardrobe box",
                'fr' => "Wardrobe box",
            ],
            "volume"=> 0.4,
            "image" => "/images/common/icons/volume/90h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Matress(single)",
                "ru" => "Matress(single)",
                'fr' => "Matress(single)",
            ],
            "volume"=> 0.7,
            "image" => "/images/common/icons/volume/91h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Matress(double)",
                "ru" => "Matress(double)",
                'fr' => "Matress(double)",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/92h.svg",
            "category_id" => $this->getCategoryIdByTitle("Chamber")
            , 'position' => 0,
            'is_active' => true]);


        //garden
        Subcategory::create([
            "title" => [
                "en" => "Garden table",
                "ru" => "Garden table",
                'fr' => "Garden table",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/93h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Garden chair",
                "ru" => "Garden chair",
                'fr' => "Garden chair",
            ],
            "volume"=> 0.15,
            "image" => "/images/common/icons/volume/7h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Sunbath",
                "ru" => "Sunbath",
                'fr' => "Sunbath",
            ],
            "volume"=> 0.75,
            "image" => "/images/common/icons/volume/95h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Parasol",
                "ru" => "Parasol",
                'fr' => "Parasol",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/96h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Barbecue(Coal)",
                "ru" => "Barbecue(Coal)",
                'fr' => "Barbecue(Coal)",
            ],
            "volume"=> 0.4,
            "image" => "/images/common/icons/volume/97h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Barbecue(Electric)",
                "ru" => "Barbecue(Electric)",
                'fr' => "Barbecue(Electric)",
            ],
            "volume"=> 0.7,
            "image" => "/images/common/icons/volume/98h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Barbecue(Stone)",
                "ru" => "Barbecue(Stone)",
                'fr' => "Barbecue(Stone)",
            ],
            "volume"=> 1.7,
            "image" => "/images/common/icons/volume/99h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Arbor",
                "ru" => "Arbor",
                'fr' => "Arbor",
            ],
            "volume"=> 3.0,
            "image" => "/images/common/icons/volume/100h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Plants(Small)",
                "ru" => "Plants(Small)",
                'fr' => "Plants(Small)",
            ],
            "volume"=> 0.3,
            "image" => "/images/common/icons/volume/101h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Plants(Medium)",
                "ru" => "Plants(Medium)",
                'fr' => "Plants(Medium)",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/102h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Plants(Large)",
                "ru" => "Plants(Large)",
                'fr' => "Plants(Large)",
            ],
            "volume"=> 0.7,
            "image" => "/images/common/icons/volume/103h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Mower",
                "ru" => "Mower",
                'fr' => "Mower",
            ],
            "volume"=> 1.4,
            "image" => "/images/common/icons/volume/104h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garden")
            , 'position' => 0,
            'is_active' => true]);

        //Garage
        Subcategory::create([
            "title" => [
                "en" => "Motorcycle",
                "ru" => "Motorcycle",
                'fr' => "Motorcycle",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/105h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Scooter",
                "ru" => "Scooter",
                'fr' => "Scooter",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/106h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Ladder/stepladder",
                "ru" => "Ladder/stepladder",
                'fr' => "Ladder/stepladder",
            ],
            "volume"=> 0.25,
            "image" => "/images/common/icons/volume/107h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Shelf",
                "ru" => "Shelf",
                'fr' => "Shelf",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/108h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Workbench",
                "ru" => "Workbench",
                'fr' => "Workbench",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/109h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Mower",
                "ru" => "Mower",
                'fr' => "Mower",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/110h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Moving box",
                "ru" => "Moving box",
                'fr' => "Moving box",
            ],
            "volume"=> 0.1,
            "image" => "/images/common/icons/volume/111h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bike(Adult)",
                "ru" => "Bike(Adult)",
                'fr' => "Bike(Adult)",
            ],
            "volume"=> 0.4,
            "image" => "/images/common/icons/volume/112h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
                    , 'position' => 0,
                    'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bike(Children)",
                "ru" => "Bike(Children)",
                'fr' => "Bike(Children)",
            ],
            "volume"=> 0.2,
            "image" => "/images/common/icons/volume/113h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Children Quad",
                "ru" => "Children Quad",
                'fr' => "Children Quad",
            ],
            "volume"=> 0.6,
            "image" => "/images/common/icons/volume/114h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Wine cellar (30 bottles)",
                "ru" => "Wine cellar (30 bottles)",
                'fr' => "Wine cellar (30 bottles)",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/115h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Toolbox",
                "ru" => "Toolbox",
                'fr' => "Toolbox",
            ],
            "volume"=> 0.07,
            "image" => "/images/common/icons/volume/116h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bottles of Wine",
                "ru" => "Bottles of Wine",
                'fr' => "Bottles of Wine",
            ],
            "volume"=> 0.06,
            "image" => "/images/common/icons/volume/117h.svg",
            "category_id" => $this->getCategoryIdByTitle("Garage")
            , 'position' => 0,
            'is_active' => true]);                                                                                                                                                                                                                                                                                                                                                                          


        //Miscellaneous
        Subcategory::create([
            "title" => [
                "en" => "Upright piano",
                "ru" => "Upright piano",
                'fr' => "Upright piano",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/118h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);

        Subcategory::create([
            "title" => [
                "en" => "Grand piano",
                "ru" => "Grand piano",
                'fr' => "Grand piano",
            ],
            "volume"=> 3.5,
            "image" => "/images/common/icons/volume/119h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Pool table",
                "ru" => "Pool table",
                'fr' => "Pool table",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/120h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Babyfoot",
                "ru" => "Babyfoot",
                'fr' => "Babyfoot",
            ],
            "volume"=> 1.0,
            "image" => "/images/common/icons/volume/121h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Table",
                "ru" => "Table",
                'fr' => "Table",
            ],
            "volume"=> 0.1,
            "image" => "/images/common/icons/volume/68h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(120L)",
                "ru" => "Aquarium(120L)",
                'fr' => "Aquarium(120L)",
            ],
            "volume"=> 0.15,
            "image" => "/images/common/icons/volume/123h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(180L)",
                "ru" => "Aquarium(180L)",
                'fr' => "Aquarium(180L)",
            ],
            "volume"=> 0.21,
            "image" => "/images/common/icons/volume/124h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(240L)",
                "ru" => "Aquarium(240L)",
                'fr' => "Aquarium(240L)",
            ],
            "volume"=> 0.28,
            "image" => "/images/common/icons/volume/125h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(300L)",
                "ru" => "Aquarium(300L)",
                'fr' => "Aquarium(300L)",
            ],
            "volume"=> 0.4,
            "image" => "/images/common/icons/volume/126h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(400L)",
                "ru" => "Aquarium(400L)",
                'fr' => "Aquarium(400L)",
            ],
            "volume"=> 0.5,
            "image" => "/images/common/icons/volume/127h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bodybuilding equipment (Exercise bike)",
                "ru" => "Bodybuilding equipment (Exercise bike)",
                'fr' => "Bodybuilding equipment (Exercise bike)",
            ],
            "volume"=> 2.0,
            "image" => "/images/common/icons/volume/128h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Bodybuilding equipment (Treadmill)",
                "ru" => "Bodybuilding equipment (Treadmill)",
                'fr' => "Bodybuilding equipment (Treadmill)",
            ],
            "volume"=> 2.5,
            "image" => "/images/common/icons/volume/129h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Wheelbarrow",
                "ru" => "Wheelbarrow",
                'fr' => "Wheelbarrow",
            ],
            "volume"=> 0.45,
            "image" => "/images/common/icons/volume/130h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
        Subcategory::create([
            "title" => [
                "en" => "Ping pong table",
                "ru" => "Ping pong table",
                'fr' => "Ping pong table",
            ],
            "volume"=> 1.5,
            "image" => "/images/common/icons/volume/131h.svg",
            "category_id" => $this->getCategoryIdByTitle("Miscellaneous")
            , 'position' => 0,
            'is_active' => true]);
    }
}
