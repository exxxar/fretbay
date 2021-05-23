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


         //Living room
         TypeOfObject::create([
            "title" => [
                "en"=>"Moving box",
                "ru"=>"Moving box",
                'fr'=>"Moving box",
            ],
            "img" => "/images/common/icons/volume/17h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        TypeOfObject::create([
            "title" => [
                "en"=>"Office desk",
                "ru"=>"Office desk",
                'fr'=>"Office desk",
            ],
            "img" => "/images/common/icons/volume/18h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        TypeOfObject::create([
            "title" =>
            [
                "en"=>"2-seater sofa",
                "ru"=>"2-seater sofa",
                'fr'=>"2-seater sofa",
            ],
            "img" => "/images/common/icons/volume/29h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);

        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Chair",
                "ru"=>"Chair",
                'fr'=>"Chair",
            ],
            "img" => "/images/common/icons/volume/30h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Armchair",
                "ru"=>"Armchair",
                'fr'=>"Armchair",
            ],
            "img" => "/images/common/icons/volume/19h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Living",
                "ru"=>"Living",
                'fr'=>"Living",
            ],
            "img" => "/images/common/icons/volume/67h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"HiFi system",
                "ru"=>"HiFi system",
                'fr'=>"HiFi system",
            ],
            "img" => "/images/common/icons/volume/20h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Secretary desk",
                "ru"=>"Secretary desk",
                'fr'=>"Secretary desk",
            ],
            "img" => "/images/common/icons/volume/32h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);

         TypeOfObject::create([
            "title" => [
                "en"=>"Coffee table",
                "ru"=>"Coffee table",
                'fr'=>"Coffee table",
            ],
            "img" => "/images/common/icons/volume/21h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        TypeOfObject::create([
            "title" => [
                "en"=>"Sofa bed",
                "ru"=>"Sofa bed",
                'fr'=>"Sofa bed",
            ],
            "img" => "/images/common/icons/volume/33h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        TypeOfObject::create([
            "title" =>
            [
                "en"=>"3-seater sofa",
                "ru"=>"3-seater sofa",
                'fr'=>"3-seater sofa",
            ],
            "img" => "/images/common/icons/volume/22h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);

        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Corner sofa",
                "ru"=>"Corner sofa",
                'fr'=>"Corner sofa",
            ],
            "img" => "/images/common/icons/volume/34h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"TV",
                "ru"=>"TV",
                'fr'=>"TV",
            ],
            "img" => "/images/common/icons/volume/23h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"TV+Furniture",
                "ru"=>"TV+Furniture",
                'fr'=>"TV+Furniture",
            ],
            "img" => "/images/common/icons/volume/35h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Library",
                "ru"=>"Library",
                'fr'=>"Library",
            ],
            "img" => "/images/common/icons/volume/24h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Showcase",
                "ru"=>"Showcase",
                'fr'=>"Showcase",
            ],
            "img" => "/images/common/icons/volume/36h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Floor lamp",
                "ru"=>"Floor lamp",
                'fr'=>"Floor lamp",
            ],
            "img" => "/images/common/icons/volume/25h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Trunk with drawers",
                "ru"=>"Trunk with drawers",
                'fr'=>"Trunk with drawers",
            ],
            "img" => "/images/common/icons/volume/37h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Lightning (Chandelier)",
                "ru"=>"Lightning (Chandelier)",
                'fr'=>"Lightning (Chandelier)",
            ],
            "img" => "/images/common/icons/volume/26h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Lightning (Bedside lamp)",
                "ru"=>"Lightning (Bedside lamp)",
                'fr'=>"Lightning (Bedside lamp)",
            ],
            "img" => "/images/common/icons/volume/27h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Lightning (Floor lamp)",
                "ru"=>"Lightning (Floor lamp)",
                'fr'=>"Lightning (Floor lamp)",
            ],
            "img" => "/images/common/icons/volume/28h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Pouf",
                "ru"=>"Pouf",
                'fr'=>"Pouf",
            ],
            "img" => "/images/common/icons/volume/38h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);
        TypeOfObject::create([
            "title" =>
            [
                "en"=>"Bolster/side table",
                "ru"=>"Bolster/side table",
                'fr'=>"Bolster/side table",
            ],
            "img" => "/images/common/icons/volume/39h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Living room")
        ]);


        //Kitchen
        TypeOfObject::create([
            "title" => [
                "en"=>"Buffet",
                "ru"=>"Buffet",
                'fr'=>"Buffet",
            ],
            "img" => "/images/common/icons/volume/66h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"High element",
                "ru"=>"High element",
                'fr'=>"High element",
            ],
            "img" => "/images/common/icons/volume/50h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Low element",
                "ru"=>"Low element",
                'fr'=>"Low element",
            ],
            "img" => "/images/common/icons/volume/41h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Chair",
                "ru"=>"Chair",
                'fr'=>"Chair",
            ],
            "img" => "/images/common/icons/volume/51h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Table",
                "ru"=>"Table",
                'fr'=>"Table",
            ],
            "img" => "/images/common/icons/volume/10h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Stool",
                "ru"=>"Stool",
                'fr'=>"Stool",
            ],
            "img" => "/images/common/icons/volume/52h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Cooker",
                "ru"=>"Cooker",
                'fr'=>"Cooker",
            ],
            "img" => "/images/common/icons/volume/43h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Fridge",
                "ru"=>"Fridge",
                'fr'=>"Fridge",
            ],
            "img" => "/images/common/icons/volume/53h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Dishwasher",
                "ru"=>"Dishwasher",
                'fr'=>"Dishwasher",
            ],
            "img" => "/images/common/icons/volume/44h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Oven",
                "ru"=>"Oven",
                'fr'=>"Oven",
            ],
            "img" => "/images/common/icons/volume/54h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Baby chair",
                "ru"=>"Baby chair",
                'fr'=>"Baby chair",
            ],
            "img" => "/images/common/icons/volume/45h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Cooking plate",
                "ru"=>"Cooking plate",
                'fr'=>"Cooking plate",
            ],
            "img" => "/images/common/icons/volume/55h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Microwave",
                "ru"=>"Microwave",
                'fr'=>"Microwave",
            ],
            "img" => "/images/common/icons/volume/46h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Freezer",
                "ru"=>"Freezer",
                'fr'=>"Freezer",
            ],
            "img" => "/images/common/icons/volume/56h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Washing machine",
                "ru"=>"Washing machine",
                'fr'=>"Washing machine",
            ],
            "img" => "/images/common/icons/volume/57h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Bar/Counter",
                "ru"=>"Bar/Counter",
                'fr'=>"Bar/Counter",
            ],
            "img" => "/images/common/icons/volume/48h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Refrigerator(Standard)",
                "ru"=>"Refrigerator(Standard)",
                'fr'=>"Refrigerator(Standard)",
            ],
            "img" => "/images/common/icons/volume/57h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Refrigerator(Top)",
                "ru"=>"Refrigerator(Top)",
                'fr'=>"Refrigerator(Top)",
            ],
            "img" => "/images/common/icons/volume/58h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Refrigerator(American)",
                "ru"=>"Refrigerator(American)",
                'fr'=>"Refrigerator(American)",
            ],
            "img" => "/images/common/icons/volume/59h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Bench",
                "ru"=>"Bench",
                'fr'=>"Bench",
            ],
            "img" => "/images/common/icons/volume/49h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Kitchen")
        ]);






         //Dining room
         TypeOfObject::create([
            "title" => [
                "en"=>"2-bodied buffet",
                "ru"=>"2-bodied buffet",
                'fr'=>"2-bodied buffet",
            ],
            "img" => "/images/common/icons/volume/60h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Low buffet",
                "ru"=>"Low buffet",
                'fr'=>"Low buffet",
            ],
            "img" => "/images/common/icons/volume/66h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Service",
                "ru"=>"Service",
                'fr'=>"Service",
            ],
            "img" => "/images/common/icons/volume/61h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Living",
                "ru"=>"Living",
                'fr'=>"Living",
            ],
            "img" => "/images/common/icons/volume/67h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Chair",
                "ru"=>"Chair",
                'fr'=>"Chair",
            ],
            "img" => "/images/common/icons/volume/30h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Table",
                "ru"=>"Table",
                'fr'=>"Table",
            ],
            "img" => "/images/common/icons/volume/10h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Pantry cabinet",
                "ru"=>"Pantry cabinet",
                'fr'=>"Pantry cabinet",
            ],
            "img" => "/images/common/icons/volume/63h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Pedestal table",
                "ru"=>"Pedestal table",
                'fr'=>"Pedestal table",
            ],
            "img" => "/images/common/icons/volume/69h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Dresser",
                "ru"=>"Dresser",
                'fr'=>"Dresser",
            ],
            "img" => "/images/common/icons/volume/64h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Armchair",
                "ru"=>"Armchair",
                'fr'=>"Armchair",
            ],
            "img" => "/images/common/icons/volume/70h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Moving box",
                "ru"=>"Moving box",
                'fr'=>"Moving box",
            ],
            "img" => "/images/common/icons/volume/65h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Grandfather clock",
                "ru"=>"Grandfather clock",
                'fr'=>"Grandfather clock",
            ],
            "img" => "/images/common/icons/volume/71h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Dining room")
        ]);

        


        //Chamber
        TypeOfObject::create([
            "title" => [
                "en"=>"Chair",
                "ru"=>"Chair",
                'fr'=>"Chair",
            ],
            "img" => "/images/common/icons/volume/72h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Chest of drawers",
                "ru"=>"Chest of drawers",
                'fr'=>"Chest of drawers",
            ],
            "img" => "/images/common/icons/volume/82h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Armchair",
                "ru"=>"Armchair",
                'fr'=>"Armchair",
            ],
            "img" => "/images/common/icons/volume/73h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Single bed",
                "ru"=>"Single bed",
                'fr'=>"Single bed",
            ],
            "img" => "/images/common/icons/volume/83h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Bed(double)",
                "ru"=>"Bed(double)",
                'fr'=>"Bed(double)",
            ],
            "img" => "/images/common/icons/volume/74h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Bedside",
                "ru"=>"Bedside",
                'fr'=>"Bedside",
            ],
            "img" => "/images/common/icons/volume/84h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Bunk bed",
                "ru"=>"Bunk bed",
                'fr'=>"Bunk bed",
            ],
            "img" => "/images/common/icons/volume/75h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Baby bed",
                "ru"=>"Baby bed",
                'fr'=>"Baby bed",
            ],
            "img" => "/images/common/icons/volume/85h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Wardrobe 2 doors",
                "ru"=>"Wardrobe 2 doors",
                'fr'=>"Wardrobe 2 doors",
            ],
            "img" => "/images/common/icons/volume/76h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"3-doored wardrobe",
                "ru"=>"3-doored wardrobe",
                'fr'=>"3-doored wardrobe",
            ],
            "img" => "/images/common/icons/volume/86h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Toy chest",
                "ru"=>"Toy chest",
                'fr'=>"Toy chest",
            ],
            "img" => "/images/common/icons/volume/77h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Changing table",
                "ru"=>"Changing table",
                'fr'=>"Changing table",
            ],
            "img" => "/images/common/icons/volume/87h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Moving box",
                "ru"=>"Moving box",
                'fr'=>"Moving box",
            ],
            "img" => "/images/common/icons/volume/78h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Dressing table",
                "ru"=>"Dressing table",
                'fr'=>"Dressing table",
            ],
            "img" => "/images/common/icons/volume/79h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Dressing",
                "ru"=>"Dressing",
                'fr'=>"Dressing",
            ],
            "img" => "/images/common/icons/volume/80h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Office chair",
                "ru"=>"Office chair",
                'fr'=>"Office chair",
            ],
            "img" => "/images/common/icons/volume/81h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Trunk/canteen",
                "ru"=>"Trunk/canteen",
                'fr'=>"Trunk/canteen",
            ],
            "img" => "/images/common/icons/volume/88h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Pouf,footrest",
                "ru"=>"Pouf,footrest",
                'fr'=>"Pouf,footrest",
            ],
            "img" => "/images/common/icons/volume/89h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Wardrobe box",
                "ru"=>"Wardrobe box",
                'fr'=>"Wardrobe box",
            ],
            "img" => "/images/common/icons/volume/90h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Matress(single)",
                "ru"=>"Matress(single)",
                'fr'=>"Matress(single)",
            ],
            "img" => "/images/common/icons/volume/91h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Matress(double)",
                "ru"=>"Matress(double)",
                'fr'=>"Matress(double)",
            ],
            "img" => "/images/common/icons/volume/92h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Chamber")
        ]);



        //garden
        TypeOfObject::create([
            "title" => [
                "en"=>"Garden table",
                "ru"=>"Garden table",
                'fr'=>"Garden table",
            ],
            "img" => "/images/common/icons/volume/93h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Garden chair",
                "ru"=>"Garden chair",
                'fr'=>"Garden chair",
            ],
            "img" => "/images/common/icons/volume/7h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Sunbath",
                "ru"=>"Sunbath",
                'fr'=>"Sunbath",
            ],
            "img" => "/images/common/icons/volume/95h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Parasol",
                "ru"=>"Parasol",
                'fr'=>"Parasol",
            ],
            "img" => "/images/common/icons/volume/96h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Barbecue(Coal)",
                "ru"=>"Barbecue(Coal)",
                'fr'=>"Barbecue(Coal)",
            ],
            "img" => "/images/common/icons/volume/97h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Barbecue(Electric)",
                "ru"=>"Barbecue(Electric)",
                'fr'=>"Barbecue(Electric)",
            ],
            "img" => "/images/common/icons/volume/98h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Barbecue(Stone)",
                "ru"=>"Barbecue(Stone)",
                'fr'=>"Barbecue(Stone)",
            ],
            "img" => "/images/common/icons/volume/99h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Arbor",
                "ru"=>"Arbor",
                'fr'=>"Arbor",
            ],
            "img" => "/images/common/icons/volume/100h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Plants(Small)",
                "ru"=>"Plants(Small)",
                'fr'=>"Plants(Small)",
            ],
            "img" => "/images/common/icons/volume/101h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Plants(Medium)",
                "ru"=>"Plants(Medium)",
                'fr'=>"Plants(Medium)",
            ],
            "img" => "/images/common/icons/volume/102h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Plants(Large)",
                "ru"=>"Plants(Large)",
                'fr'=>"Plants(Large)",
            ],
            "img" => "/images/common/icons/volume/103h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
        TypeOfObject::create([
            "title" => [
                "en"=>"Mower",
                "ru"=>"Mower",
                'fr'=>"Mower",
            ],
            "img" => "/images/common/icons/volume/104h.svg",
            "object_category_id" =>$this->getCategoryIdByTitle("Garden")
        ]);
    }
}
