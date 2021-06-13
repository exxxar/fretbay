<?php

use App\Subcategory;
use App\Thing;
use Illuminate\Database\Seeder;

class ThingSeeder extends Seeder
{
    public function getCategoryIdByTitle($title)
    {
        return Subcategory::where("title->en", $title)->first()->id;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Thing::class, 5)->create();

        //Entrance
        Thing::create([
            "title" => [
                "en"=>"TV stand",
                "ru"=>"TV stand",
                'fr'=>"TV stand",
            ],
            "image" => "/images/common/icons/volume/132h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Entrance"),

        ]);


        Thing::create([
            "title" => [
                "en"=>"Mirror",
                "ru"=>"Mirror",
                'fr'=>"Mirror",
            ],
            "image" => "/images/common/icons/volume/2h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.65,
            "subcategory_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);


        Thing::create([
            "title" =>
                [
                    "en"=>"Shoe cabinet",
                    "ru"=>"Shoe cabinet",
                    'fr'=>"Shoe cabinet",
                ],
            "image" => "/images/common/icons/volume/3h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 3.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);

        Thing::create([
            "title" =>
                [
                    "en"=>"Carpet",
                    "ru"=>"Carpet",
                    'fr'=>"Carpet",
                ],
            "image" => "/images/common/icons/volume/3h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 5.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Pedestal table",
                    "ru"=>"Pedestal table",
                    'fr'=>"Pedestal table",
                ],
            "image" => "/images/common/icons/volume/5h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 1.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Console",
                    "ru"=>"Console",
                    'fr'=>"Console",
                ],
            "image" => "/images/common/icons/volume/6h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.8,
            "subcategory_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Chair",
                    "ru"=>"Chair",
                    'fr'=>"Chair",
                ],
            "image" => "/images/common/icons/volume/30h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.9,
            "subcategory_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Moving box",
                    "ru"=>"Moving box",
                    'fr'=>"Moving box",
                ],
            "image" => "/images/common/icons/volume/8h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Entrance")
        ]);



        //Bathroom
        Thing::create([
            "title" => [
                "en"=>"Column cabinet",
                "ru"=>"Column cabinet",
                'fr'=>"Column cabinet",
            ],
            "image" => "/images/common/icons/volume/9h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.15,
            "subcategory_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);


        Thing::create([
            "title" => [
                "en"=>"Low cabinet",
                "ru"=>"Low cabinet",
                'fr'=>"Low cabinet",
            ],
            "image" => "/images/common/icons/volume/10h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 10.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);


        Thing::create([
            "title" =>
                [
                    "en"=>"Laundry basket",
                    "ru"=>"Laundry basket",
                    'fr'=>"Laundry basket",
                ],
            "image" => "/images/common/icons/volume/11h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 2.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);

        Thing::create([
            "title" =>
                [
                    "en"=>"Moving box",
                    "ru"=>"Moving box",
                    'fr'=>"Moving box",
                ],
            "image" => "/images/common/icons/volume/12h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 9.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Washing machine",
                    "ru"=>"Washing machine",
                    'fr'=>"Washing machine",
                ],
            "image" => "/images/common/icons/volume/13h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.35,
            "subcategory_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Dryer",
                    "ru"=>"Dryer",
                    'fr'=>"Dryer",
                ],
            "image" => "/images/common/icons/volume/14h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.65,
            "subcategory_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Medicine closet",
                    "ru"=>"Medicine closet",
                    'fr'=>"Medicine closet",
                ],
            "image" => "/images/common/icons/volume/15h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.75,
            "subcategory_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Wall shelf",
                    "ru"=>"Wall shelf",
                    'fr'=>"Wall shelf",
                ],
            "image" => "/images/common/icons/volume/16h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.35,
            "subcategory_id" =>$this->getCategoryIdByTitle("Bathroom")
        ]);


        //Living room
        Thing::create([
            "title" => [
                "en"=>"Moving box",
                "ru"=>"Moving box",
                'fr'=>"Moving box",
            ],
            "image" => "/images/common/icons/volume/17h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.55,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        Thing::create([
            "title" => [
                "en"=>"Office desk",
                "ru"=>"Office desk",
                'fr'=>"Office desk",
            ],
            "image" => "/images/common/icons/volume/18h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        Thing::create([
            "title" =>
                [
                    "en"=>"2-seater sofa",
                    "ru"=>"2-seater sofa",
                    'fr'=>"2-seater sofa",
                ],
            "image" => "/images/common/icons/volume/29h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);

        Thing::create([
            "title" =>
                [
                    "en"=>"Chair",
                    "ru"=>"Chair",
                    'fr'=>"Chair",
                ],
            "image" => "/images/common/icons/volume/30h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Armchair",
                    "ru"=>"Armchair",
                    'fr'=>"Armchair",
                ],
            "image" => "/images/common/icons/volume/19h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Living",
                    "ru"=>"Living",
                    'fr'=>"Living",
                ],
            "image" => "/images/common/icons/volume/67h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"HiFi system",
                    "ru"=>"HiFi system",
                    'fr'=>"HiFi system",
                ],
            "image" => "/images/common/icons/volume/20h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Secretary desk",
                    "ru"=>"Secretary desk",
                    'fr'=>"Secretary desk",
                ],
            "image" => "/images/common/icons/volume/32h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);

        Thing::create([
            "title" => [
                "en"=>"Coffee table",
                "ru"=>"Coffee table",
                'fr'=>"Coffee table",
            ],
            "image" => "/images/common/icons/volume/21h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        Thing::create([
            "title" => [
                "en"=>"Sofa bed",
                "ru"=>"Sofa bed",
                'fr'=>"Sofa bed",
            ],
            "image" => "/images/common/icons/volume/33h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        Thing::create([
            "title" =>
                [
                    "en"=>"3-seater sofa",
                    "ru"=>"3-seater sofa",
                    'fr'=>"3-seater sofa",
                ],
            "image" => "/images/common/icons/volume/22h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);

        Thing::create([
            "title" =>
                [
                    "en"=>"Corner sofa",
                    "ru"=>"Corner sofa",
                    'fr'=>"Corner sofa",
                ],
            "image" => "/images/common/icons/volume/34h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"TV",
                    "ru"=>"TV",
                    'fr'=>"TV",
                ],
            "image" => "/images/common/icons/volume/23h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"TV+Furniture",
                    "ru"=>"TV+Furniture",
                    'fr'=>"TV+Furniture",
                ],
            "image" => "/images/common/icons/volume/35h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Library",
                    "ru"=>"Library",
                    'fr'=>"Library",
                ],
            "image" => "/images/common/icons/volume/24h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Showcase",
                    "ru"=>"Showcase",
                    'fr'=>"Showcase",
                ],
            "image" => "/images/common/icons/volume/36h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Floor lamp",
                    "ru"=>"Floor lamp",
                    'fr'=>"Floor lamp",
                ],
            "image" => "/images/common/icons/volume/25h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Trunk with drawers",
                    "ru"=>"Trunk with drawers",
                    'fr'=>"Trunk with drawers",
                ],
            "image" => "/images/common/icons/volume/37h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Lightning (Chandelier)",
                    "ru"=>"Lightning (Chandelier)",
                    'fr'=>"Lightning (Chandelier)",
                ],
            "image" => "/images/common/icons/volume/26h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Lightning (Bedside lamp)",
                    "ru"=>"Lightning (Bedside lamp)",
                    'fr'=>"Lightning (Bedside lamp)",
                ],
            "image" => "/images/common/icons/volume/27h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Lightning (Floor lamp)",
                    "ru"=>"Lightning (Floor lamp)",
                    'fr'=>"Lightning (Floor lamp)",
                ],
            "image" => "/images/common/icons/volume/28h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Pouf",
                    "ru"=>"Pouf",
                    'fr'=>"Pouf",
                ],
            "image" => "/images/common/icons/volume/38h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        Thing::create([
            "title" =>
                [
                    "en"=>"Bolster/side table",
                    "ru"=>"Bolster/side table",
                    'fr'=>"Bolster/side table",
                ],
            "image" => "/images/common/icons/volume/39h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        //Kitchen
        Thing::create([
            "title" => [
                "en"=>"Buffet",
                "ru"=>"Buffet",
                'fr'=>"Buffet",
            ],
            "image" => "/images/common/icons/volume/66h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"High element",
                "ru"=>"High element",
                'fr'=>"High element",
            ],
            "image" => "/images/common/icons/volume/50h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Low element",
                "ru"=>"Low element",
                'fr'=>"Low element",
            ],
            "image" => "/images/common/icons/volume/41h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Chair",
                "ru"=>"Chair",
                'fr'=>"Chair",
            ],
            "image" => "/images/common/icons/volume/51h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Table",
                "ru"=>"Table",
                'fr'=>"Table",
            ],
            "image" => "/images/common/icons/volume/10h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Stool",
                "ru"=>"Stool",
                'fr'=>"Stool",
            ],
            "image" => "/images/common/icons/volume/52h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Cooker",
                "ru"=>"Cooker",
                'fr'=>"Cooker",
            ],
            "image" => "/images/common/icons/volume/43h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Fridge",
                "ru"=>"Fridge",
                'fr'=>"Fridge",
            ],
            "image" => "/images/common/icons/volume/53h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Dishwasher",
                "ru"=>"Dishwasher",
                'fr'=>"Dishwasher",
            ],
            "image" => "/images/common/icons/volume/44h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Oven",
                "ru"=>"Oven",
                'fr'=>"Oven",
            ],
            "image" => "/images/common/icons/volume/54h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Baby chair",
                "ru"=>"Baby chair",
                'fr'=>"Baby chair",
            ],
            "image" => "/images/common/icons/volume/45h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Cooking plate",
                "ru"=>"Cooking plate",
                'fr'=>"Cooking plate",
            ],
            "image" => "/images/common/icons/volume/55h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Microwave",
                "ru"=>"Microwave",
                'fr'=>"Microwave",
            ],
            "image" => "/images/common/icons/volume/46h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Freezer",
                "ru"=>"Freezer",
                'fr'=>"Freezer",
            ],
            "image" => "/images/common/icons/volume/56h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Washing machine",
                "ru"=>"Washing machine",
                'fr'=>"Washing machine",
            ],
            "image" => "/images/common/icons/volume/57h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Bar/Counter",
                "ru"=>"Bar/Counter",
                'fr'=>"Bar/Counter",
            ],
            "image" => "/images/common/icons/volume/48h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Refrigerator(Standard)",
                "ru"=>"Refrigerator(Standard)",
                'fr'=>"Refrigerator(Standard)",
            ],
            "image" => "/images/common/icons/volume/57h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Refrigerator(Top)",
                "ru"=>"Refrigerator(Top)",
                'fr'=>"Refrigerator(Top)",
            ],
            "image" => "/images/common/icons/volume/58h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Refrigerator(American)",
                "ru"=>"Refrigerator(American)",
                'fr'=>"Refrigerator(American)",
            ],
            "image" => "/images/common/icons/volume/59h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Bench",
                "ru"=>"Bench",
                'fr'=>"Bench",
            ],
            "image" => "/images/common/icons/volume/49h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);






        //Dining room
        Thing::create([
            "title" => [
                "en"=>"2-bodied buffet",
                "ru"=>"2-bodied buffet",
                'fr'=>"2-bodied buffet",
            ],
            "image" => "/images/common/icons/volume/60h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Low buffet",
                "ru"=>"Low buffet",
                'fr'=>"Low buffet",
            ],
            "image" => "/images/common/icons/volume/66h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Service",
                "ru"=>"Service",
                'fr'=>"Service",
            ],
            "image" => "/images/common/icons/volume/61h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Living",
                "ru"=>"Living",
                'fr'=>"Living",
            ],
            "image" => "/images/common/icons/volume/67h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Chair",
                "ru"=>"Chair",
                'fr'=>"Chair",
            ],
            "image" => "/images/common/icons/volume/30h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Table",
                "ru"=>"Table",
                'fr'=>"Table",
            ],
            "image" => "/images/common/icons/volume/10h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Pantry cabinet",
                "ru"=>"Pantry cabinet",
                'fr'=>"Pantry cabinet",
            ],
            "image" => "/images/common/icons/volume/63h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Pedestal table",
                "ru"=>"Pedestal table",
                'fr'=>"Pedestal table",
            ],
            "image" => "/images/common/icons/volume/69h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Dresser",
                "ru"=>"Dresser",
                'fr'=>"Dresser",
            ],
            "image" => "/images/common/icons/volume/64h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Armchair",
                "ru"=>"Armchair",
                'fr'=>"Armchair",
            ],
            "image" => "/images/common/icons/volume/70h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Moving box",
                "ru"=>"Moving box",
                'fr'=>"Moving box",
            ],
            "image" => "/images/common/icons/volume/65h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Grandfather clock",
                "ru"=>"Grandfather clock",
                'fr'=>"Grandfather clock",
            ],
            "image" => "/images/common/icons/volume/71h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);




        //Chamber
        Thing::create([
            "title" => [
                "en"=>"Chair",
                "ru"=>"Chair",
                'fr'=>"Chair",
            ],
            "image" => "/images/common/icons/volume/72h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Chest of drawers",
                "ru"=>"Chest of drawers",
                'fr'=>"Chest of drawers",
            ],
            "image" => "/images/common/icons/volume/82h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Armchair",
                "ru"=>"Armchair",
                'fr'=>"Armchair",
            ],
            "image" => "/images/common/icons/volume/73h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Single bed",
                "ru"=>"Single bed",
                'fr'=>"Single bed",
            ],
            "image" => "/images/common/icons/volume/83h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Bed(double)",
                "ru"=>"Bed(double)",
                'fr'=>"Bed(double)",
            ],
            "image" => "/images/common/icons/volume/74h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Bedside",
                "ru"=>"Bedside",
                'fr'=>"Bedside",
            ],
            "image" => "/images/common/icons/volume/84h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Bunk bed",
                "ru"=>"Bunk bed",
                'fr'=>"Bunk bed",
            ],
            "image" => "/images/common/icons/volume/75h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Baby bed",
                "ru"=>"Baby bed",
                'fr'=>"Baby bed",
            ],
            "image" => "/images/common/icons/volume/85h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Wardrobe 2 doors",
                "ru"=>"Wardrobe 2 doors",
                'fr'=>"Wardrobe 2 doors",
            ],
            "image" => "/images/common/icons/volume/76h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"3-doored wardrobe",
                "ru"=>"3-doored wardrobe",
                'fr'=>"3-doored wardrobe",
            ],
            "image" => "/images/common/icons/volume/86h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Toy chest",
                "ru"=>"Toy chest",
                'fr'=>"Toy chest",
            ],
            "image" => "/images/common/icons/volume/77h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Changing table",
                "ru"=>"Changing table",
                'fr'=>"Changing table",
            ],
            "image" => "/images/common/icons/volume/87h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Moving box",
                "ru"=>"Moving box",
                'fr'=>"Moving box",
            ],
            "image" => "/images/common/icons/volume/78h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Dressing table",
                "ru"=>"Dressing table",
                'fr'=>"Dressing table",
            ],
            "image" => "/images/common/icons/volume/79h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Dressing",
                "ru"=>"Dressing",
                'fr'=>"Dressing",
            ],
            "image" => "/images/common/icons/volume/80h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Office chair",
                "ru"=>"Office chair",
                'fr'=>"Office chair",
            ],
            "image" => "/images/common/icons/volume/81h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Trunk/canteen",
                "ru"=>"Trunk/canteen",
                'fr'=>"Trunk/canteen",
            ],
            "image" => "/images/common/icons/volume/88h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Pouf,footrest",
                "ru"=>"Pouf,footrest",
                'fr'=>"Pouf,footrest",
            ],
            "image" => "/images/common/icons/volume/89h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Wardrobe box",
                "ru"=>"Wardrobe box",
                'fr'=>"Wardrobe box",
            ],
            "image" => "/images/common/icons/volume/90h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Matress(single)",
                "ru"=>"Matress(single)",
                'fr'=>"Matress(single)",
            ],
            "image" => "/images/common/icons/volume/91h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Matress(double)",
                "ru"=>"Matress(double)",
                'fr'=>"Matress(double)",
            ],
            "image" => "/images/common/icons/volume/92h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);



        //garden
        Thing::create([
            "title" => [
                "en"=>"Garden table",
                "ru"=>"Garden table",
                'fr'=>"Garden table",
            ],
            "image" => "/images/common/icons/volume/93h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Garden chair",
                "ru"=>"Garden chair",
                'fr'=>"Garden chair",
            ],
            "image" => "/images/common/icons/volume/7h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Sunbath",
                "ru"=>"Sunbath",
                'fr'=>"Sunbath",
            ],
            "image" => "/images/common/icons/volume/95h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Parasol",
                "ru"=>"Parasol",
                'fr'=>"Parasol",
            ],
            "image" => "/images/common/icons/volume/96h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Barbecue(Coal)",
                "ru"=>"Barbecue(Coal)",
                'fr'=>"Barbecue(Coal)",
            ],
            "image" => "/images/common/icons/volume/97h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Barbecue(Electric)",
                "ru"=>"Barbecue(Electric)",
                'fr'=>"Barbecue(Electric)",
            ],
            "image" => "/images/common/icons/volume/98h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Barbecue(Stone)",
                "ru"=>"Barbecue(Stone)",
                'fr'=>"Barbecue(Stone)",
            ],
            "image" => "/images/common/icons/volume/99h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Arbor",
                "ru"=>"Arbor",
                'fr'=>"Arbor",
            ],
            "image" => "/images/common/icons/volume/100h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Plants(Small)",
                "ru"=>"Plants(Small)",
                'fr'=>"Plants(Small)",
            ],
            "image" => "/images/common/icons/volume/101h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Plants(Medium)",
                "ru"=>"Plants(Medium)",
                'fr'=>"Plants(Medium)",
            ],
            "image" => "/images/common/icons/volume/102h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Plants(Large)",
                "ru"=>"Plants(Large)",
                'fr'=>"Plants(Large)",
            ],
            "image" => "/images/common/icons/volume/103h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Mower",
                "ru"=>"Mower",
                'fr'=>"Mower",
            ],
            "image" => "/images/common/icons/volume/104h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Garden")
        ]);


        //Miscellaneous
        Thing::create([
            "title" => [
                "en"=>"Upright piano",
                "ru"=>"Upright piano",
                'fr'=>"Upright piano",
            ],
            "image" => "/images/common/icons/volume/118h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Grand piano",
                "ru"=>"Grand piano",
                'fr'=>"Grand piano",
            ],
            "image" => "/images/common/icons/volume/119h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Pool table",
                "ru"=>"Pool table",
                'fr'=>"Pool table",
            ],
            "image" => "/images/common/icons/volume/120h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Babyfoot",
                "ru"=>"Babyfoot",
                'fr'=>"Babyfoot",
            ],
            "image" => "/images/common/icons/volume/121h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Table",
                "ru"=>"Table",
                'fr'=>"Table",
            ],
            "image" => "/images/common/icons/volume/68h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Aquarium(120L)",
                "ru"=>"Aquarium(120L)",
                'fr'=>"Aquarium(120L)",
            ],
            "image" => "/images/common/icons/volume/123h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Aquarium(180L)",
                "ru"=>"Aquarium(180L)",
                'fr'=>"Aquarium(180L)",
            ],
            "image" => "/images/common/icons/volume/124h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Aquarium(240L)",
                "ru"=>"Aquarium(240L)",
                'fr'=>"Aquarium(240L)",
            ],
            "image" => "/images/common/icons/volume/125h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Aquarium(300L)",
                "ru"=>"Aquarium(300L)",
                'fr'=>"Aquarium(300L)",
            ],
            "image" => "/images/common/icons/volume/126h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Aquarium(400L)",
                "ru"=>"Aquarium(400L)",
                'fr'=>"Aquarium(400L)",
            ],
            "image" => "/images/common/icons/volume/127h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Bodybuilding equipment (Exercise bike)",
                "ru"=>"Bodybuilding equipment (Exercise bike)",
                'fr'=>"Bodybuilding equipment (Exercise bike)",
            ],
            "image" => "/images/common/icons/volume/128h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Bodybuilding equipment (Treadmill)",
                "ru"=>"Bodybuilding equipment (Treadmill)",
                'fr'=>"Bodybuilding equipment (Treadmill)",
            ],
            "image" => "/images/common/icons/volume/129h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Wheelbarrow",
                "ru"=>"Wheelbarrow",
                'fr'=>"Wheelbarrow",
            ],
            "image" => "/images/common/icons/volume/130h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Ping pong table",
                "ru"=>"Ping pong table",
                'fr'=>"Ping pong table",
            ],
            "image" => "/images/common/icons/volume/131h.svg", 'category_id' => 2, 'position'=>0, 'is_active'=>1, 'volume' => 0.5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Miscellaneous")
        ]);

        Thing::create([
            "title" => [
                "en"=>"Volume 0-5",
                "ru"=>"Volume 0-5",
                'fr'=>"Volume 0-5",
            ],
            "image" => '/images/common/icons/category/default/3.svg', 'category_id' => 3, 'position'=>0, 'is_active'=>1, 'volume' => 5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Caravans")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Volume 5-10",
                "ru"=>"Volume 5-10",
                'fr'=>"Volume 5-10",
            ],
            "image" => '/images/common/icons/category/default/3.svg', 'category_id' => 3, 'position'=>0, 'is_active'=>1, 'volume' => 10,
            "subcategory_id" =>$this->getCategoryIdByTitle("Caravans")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Volume 0-5",
                "ru"=>"Volume 0-5",
                'fr'=>"Volume 0-5",
            ],
            "image" => '/images/common/icons/category/default/3.svg', 'category_id' => 3, 'position'=>0, 'is_active'=>1, 'volume' => 5,
            "subcategory_id" =>$this->getCategoryIdByTitle("Trailers")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Volume 5-10",
                "ru"=>"Volume 5-10",
                'fr'=>"Volume 5-10",
            ],
            "image" => '/images/common/icons/category/default/3.svg', 'category_id' => 3, 'position'=>0, 'is_active'=>1, 'volume' => 10,
            "subcategory_id" =>$this->getCategoryIdByTitle("Trailers")
        ]);
        Thing::create([
            "title" => [
                "en"=>"Volume 10-15",
                "ru"=>"Volume 10-15",
                'fr'=>"Volume 10-15",
            ],
            "image" => '/images/common/icons/category/default/3.svg', 'category_id' => 3, 'position'=>0, 'is_active'=>1, 'volume' => 10,
            "subcategory_id" =>$this->getCategoryIdByTitle("Trailers")
        ]);
    }
}
