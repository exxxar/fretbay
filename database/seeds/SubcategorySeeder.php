<?php
;

use App\Models\ObjectCategory;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class SubcategorySeeder extends Seeder
{

    public function getCategoryIdByTitle($title)
    {
        $tmp = ObjectCategory::where("title->en","$title")->first()->id ?? null;
        return $tmp;
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
            "image" => "/images/common/icons/volume/132h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Entrance"),

        ]);


        Subcategory::create([
            "title" => [
                "en" => "Mirror",
                "ru" => "Mirror",
                'fr' => "Mirror",
            ],
            "image" => "/images/common/icons/volume/2h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.65,
            "object_category_id" => $this->getCategoryIdByTitle("Entrance")
        ]);


        Subcategory::create([
            "title" =>
                [
                    "en" => "Shoe cabinet",
                    "ru" => "Shoe cabinet",
                    'fr' => "Shoe cabinet",
                ],
            "image" => "/images/common/icons/volume/3h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 3.5,
            "object_category_id" => $this->getCategoryIdByTitle("Entrance")
        ]);

        Subcategory::create([
            "title" =>
                [
                    "en" => "Carpet",
                    "ru" => "Carpet",
                    'fr' => "Carpet",
                ],
            "image" => "/images/common/icons/volume/3h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 5.5,
            "object_category_id" => $this->getCategoryIdByTitle("Entrance")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Pedestal table",
                    "ru" => "Pedestal table",
                    'fr' => "Pedestal table",
                ],
            "image" => "/images/common/icons/volume/5h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 1.5,
            "object_category_id" => $this->getCategoryIdByTitle("Entrance")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Console",
                    "ru" => "Console",
                    'fr' => "Console",
                ],
            "image" => "/images/common/icons/volume/6h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.8,
            "object_category_id" => $this->getCategoryIdByTitle("Entrance")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Chair",
                    "ru" => "Chair",
                    'fr' => "Chair",
                ],
            "image" => "/images/common/icons/volume/30h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.9,
            "object_category_id" => $this->getCategoryIdByTitle("Entrance")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Moving box",
                    "ru" => "Moving box",
                    'fr' => "Moving box",
                ],
            "image" => "/images/common/icons/volume/8h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Entrance")
        ]);


        //Bathroom
        Subcategory::create([
            "title" => [
                "en" => "Column cabinet",
                "ru" => "Column cabinet",
                'fr' => "Column cabinet",
            ],
            "image" => "/images/common/icons/volume/9h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.15,
            "object_category_id" => $this->getCategoryIdByTitle("Bathroom")
        ]);


        Subcategory::create([
            "title" => [
                "en" => "Low cabinet",
                "ru" => "Low cabinet",
                'fr' => "Low cabinet",
            ],
            "image" => "/images/common/icons/volume/10h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 10.5,
            "object_category_id" => $this->getCategoryIdByTitle("Bathroom")
        ]);


        Subcategory::create([
            "title" =>
                [
                    "en" => "Laundry basket",
                    "ru" => "Laundry basket",
                    'fr' => "Laundry basket",
                ],
            "image" => "/images/common/icons/volume/11h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 2.5,
            "object_category_id" => $this->getCategoryIdByTitle("Bathroom")
        ]);

        Subcategory::create([
            "title" =>
                [
                    "en" => "Moving box",
                    "ru" => "Moving box",
                    'fr' => "Moving box",
                ],
            "image" => "/images/common/icons/volume/12h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 9.5,
            "object_category_id" => $this->getCategoryIdByTitle("Bathroom")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Washing machine",
                    "ru" => "Washing machine",
                    'fr' => "Washing machine",
                ],
            "image" => "/images/common/icons/volume/13h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.35,
            "object_category_id" => $this->getCategoryIdByTitle("Bathroom")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Dryer",
                    "ru" => "Dryer",
                    'fr' => "Dryer",
                ],
            "image" => "/images/common/icons/volume/14h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.65,
            "object_category_id" => $this->getCategoryIdByTitle("Bathroom")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Medicine closet",
                    "ru" => "Medicine closet",
                    'fr' => "Medicine closet",
                ],
            "image" => "/images/common/icons/volume/15h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.75,
            "object_category_id" => $this->getCategoryIdByTitle("Bathroom")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Wall shelf",
                    "ru" => "Wall shelf",
                    'fr' => "Wall shelf",
                ],
            "image" => "/images/common/icons/volume/16h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.35,
            "object_category_id" => $this->getCategoryIdByTitle("Bathroom")
        ]);


        //Living room
        Subcategory::create([
            "title" => [
                "en" => "Moving box",
                "ru" => "Moving box",
                'fr' => "Moving box",
            ],
            "image" => "/images/common/icons/volume/17h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.55,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);


        Subcategory::create([
            "title" => [
                "en" => "Office desk",
                "ru" => "Office desk",
                'fr' => "Office desk",
            ],
            "image" => "/images/common/icons/volume/18h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);


        Subcategory::create([
            "title" =>
                [
                    "en" => "2-seater sofa",
                    "ru" => "2-seater sofa",
                    'fr' => "2-seater sofa",
                ],
            "image" => "/images/common/icons/volume/29h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);

        Subcategory::create([
            "title" =>
                [
                    "en" => "Chair",
                    "ru" => "Chair",
                    'fr' => "Chair",
                ],
            "image" => "/images/common/icons/volume/30h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Armchair",
                    "ru" => "Armchair",
                    'fr' => "Armchair",
                ],
            "image" => "/images/common/icons/volume/19h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Living",
                    "ru" => "Living",
                    'fr' => "Living",
                ],
            "image" => "/images/common/icons/volume/67h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "HiFi system",
                    "ru" => "HiFi system",
                    'fr' => "HiFi system",
                ],
            "image" => "/images/common/icons/volume/20h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Secretary desk",
                    "ru" => "Secretary desk",
                    'fr' => "Secretary desk",
                ],
            "image" => "/images/common/icons/volume/32h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);

        Subcategory::create([
            "title" => [
                "en" => "Coffee table",
                "ru" => "Coffee table",
                'fr' => "Coffee table",
            ],
            "image" => "/images/common/icons/volume/21h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);


        Subcategory::create([
            "title" => [
                "en" => "Sofa bed",
                "ru" => "Sofa bed",
                'fr' => "Sofa bed",
            ],
            "image" => "/images/common/icons/volume/33h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);


        Subcategory::create([
            "title" =>
                [
                    "en" => "3-seater sofa",
                    "ru" => "3-seater sofa",
                    'fr' => "3-seater sofa",
                ],
            "image" => "/images/common/icons/volume/22h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);

        Subcategory::create([
            "title" =>
                [
                    "en" => "Corner sofa",
                    "ru" => "Corner sofa",
                    'fr' => "Corner sofa",
                ],
            "image" => "/images/common/icons/volume/34h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "TV",
                    "ru" => "TV",
                    'fr' => "TV",
                ],
            "image" => "/images/common/icons/volume/23h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "TV+Furniture",
                    "ru" => "TV+Furniture",
                    'fr' => "TV+Furniture",
                ],
            "image" => "/images/common/icons/volume/35h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Library",
                    "ru" => "Library",
                    'fr' => "Library",
                ],
            "image" => "/images/common/icons/volume/24h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Showcase",
                    "ru" => "Showcase",
                    'fr' => "Showcase",
                ],
            "image" => "/images/common/icons/volume/36h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Floor lamp",
                    "ru" => "Floor lamp",
                    'fr' => "Floor lamp",
                ],
            "image" => "/images/common/icons/volume/25h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Trunk with drawers",
                    "ru" => "Trunk with drawers",
                    'fr' => "Trunk with drawers",
                ],
            "image" => "/images/common/icons/volume/37h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Lightning (Chandelier)",
                    "ru" => "Lightning (Chandelier)",
                    'fr' => "Lightning (Chandelier)",
                ],
            "image" => "/images/common/icons/volume/26h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Lightning (Bedside lamp)",
                    "ru" => "Lightning (Bedside lamp)",
                    'fr' => "Lightning (Bedside lamp)",
                ],
            "image" => "/images/common/icons/volume/27h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Lightning (Floor lamp)",
                    "ru" => "Lightning (Floor lamp)",
                    'fr' => "Lightning (Floor lamp)",
                ],
            "image" => "/images/common/icons/volume/28h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Pouf",
                    "ru" => "Pouf",
                    'fr' => "Pouf",
                ],
            "image" => "/images/common/icons/volume/38h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);
        Subcategory::create([
            "title" =>
                [
                    "en" => "Bolster/side table",
                    "ru" => "Bolster/side table",
                    'fr' => "Bolster/side table",
                ],
            "image" => "/images/common/icons/volume/39h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Living room")
        ]);


        //Kitchen
        Subcategory::create([
            "title" => [
                "en" => "Buffet",
                "ru" => "Buffet",
                'fr' => "Buffet",
            ],
            "image" => "/images/common/icons/volume/66h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "High element",
                "ru" => "High element",
                'fr' => "High element",
            ],
            "image" => "/images/common/icons/volume/50h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Low element",
                "ru" => "Low element",
                'fr' => "Low element",
            ],
            "image" => "/images/common/icons/volume/41h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Chair",
                "ru" => "Chair",
                'fr' => "Chair",
            ],
            "image" => "/images/common/icons/volume/51h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Table",
                "ru" => "Table",
                'fr' => "Table",
            ],
            "image" => "/images/common/icons/volume/10h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Stool",
                "ru" => "Stool",
                'fr' => "Stool",
            ],
            "image" => "/images/common/icons/volume/52h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Cooker",
                "ru" => "Cooker",
                'fr' => "Cooker",
            ],
            "image" => "/images/common/icons/volume/43h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Fridge",
                "ru" => "Fridge",
                'fr' => "Fridge",
            ],
            "image" => "/images/common/icons/volume/53h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Dishwasher",
                "ru" => "Dishwasher",
                'fr' => "Dishwasher",
            ],
            "image" => "/images/common/icons/volume/44h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Oven",
                "ru" => "Oven",
                'fr' => "Oven",
            ],
            "image" => "/images/common/icons/volume/54h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Baby chair",
                "ru" => "Baby chair",
                'fr' => "Baby chair",
            ],
            "image" => "/images/common/icons/volume/45h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Cooking plate",
                "ru" => "Cooking plate",
                'fr' => "Cooking plate",
            ],
            "image" => "/images/common/icons/volume/55h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Microwave",
                "ru" => "Microwave",
                'fr' => "Microwave",
            ],
            "image" => "/images/common/icons/volume/46h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Freezer",
                "ru" => "Freezer",
                'fr' => "Freezer",
            ],
            "image" => "/images/common/icons/volume/56h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Washing machine",
                "ru" => "Washing machine",
                'fr' => "Washing machine",
            ],
            "image" => "/images/common/icons/volume/57h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Bar/Counter",
                "ru" => "Bar/Counter",
                'fr' => "Bar/Counter",
            ],
            "image" => "/images/common/icons/volume/48h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Refrigerator(Standard)",
                "ru" => "Refrigerator(Standard)",
                'fr' => "Refrigerator(Standard)",
            ],
            "image" => "/images/common/icons/volume/57h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Refrigerator(Top)",
                "ru" => "Refrigerator(Top)",
                'fr' => "Refrigerator(Top)",
            ],
            "image" => "/images/common/icons/volume/58h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Refrigerator(American)",
                "ru" => "Refrigerator(American)",
                'fr' => "Refrigerator(American)",
            ],
            "image" => "/images/common/icons/volume/59h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Bench",
                "ru" => "Bench",
                'fr' => "Bench",
            ],
            "image" => "/images/common/icons/volume/49h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Kitchen")
        ]);


        //Dining room
        Subcategory::create([
            "title" => [
                "en" => "2-bodied buffet",
                "ru" => "2-bodied buffet",
                'fr' => "2-bodied buffet",
            ],
            "image" => "/images/common/icons/volume/60h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Low buffet",
                "ru" => "Low buffet",
                'fr' => "Low buffet",
            ],
            "image" => "/images/common/icons/volume/66h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Service",
                "ru" => "Service",
                'fr' => "Service",
            ],
            "image" => "/images/common/icons/volume/61h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Living",
                "ru" => "Living",
                'fr' => "Living",
            ],
            "image" => "/images/common/icons/volume/67h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Chair",
                "ru" => "Chair",
                'fr' => "Chair",
            ],
            "image" => "/images/common/icons/volume/30h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Table",
                "ru" => "Table",
                'fr' => "Table",
            ],
            "image" => "/images/common/icons/volume/10h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Pantry cabinet",
                "ru" => "Pantry cabinet",
                'fr' => "Pantry cabinet",
            ],
            "image" => "/images/common/icons/volume/63h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Pedestal table",
                "ru" => "Pedestal table",
                'fr' => "Pedestal table",
            ],
            "image" => "/images/common/icons/volume/69h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Dresser",
                "ru" => "Dresser",
                'fr' => "Dresser",
            ],
            "image" => "/images/common/icons/volume/64h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Armchair",
                "ru" => "Armchair",
                'fr' => "Armchair",
            ],
            "image" => "/images/common/icons/volume/70h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Moving box",
                "ru" => "Moving box",
                'fr' => "Moving box",
            ],
            "image" => "/images/common/icons/volume/65h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Grandfather clock",
                "ru" => "Grandfather clock",
                'fr' => "Grandfather clock",
            ],
            "image" => "/images/common/icons/volume/71h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Dining room")
        ]);


        //Chamber
        Subcategory::create([
            "title" => [
                "en" => "Chair",
                "ru" => "Chair",
                'fr' => "Chair",
            ],
            "image" => "/images/common/icons/volume/72h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Chest of drawers",
                "ru" => "Chest of drawers",
                'fr' => "Chest of drawers",
            ],
            "image" => "/images/common/icons/volume/82h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Armchair",
                "ru" => "Armchair",
                'fr' => "Armchair",
            ],
            "image" => "/images/common/icons/volume/73h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Single bed",
                "ru" => "Single bed",
                'fr' => "Single bed",
            ],
            "image" => "/images/common/icons/volume/83h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Bed(double)",
                "ru" => "Bed(double)",
                'fr' => "Bed(double)",
            ],
            "image" => "/images/common/icons/volume/74h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Bedside",
                "ru" => "Bedside",
                'fr' => "Bedside",
            ],
            "image" => "/images/common/icons/volume/84h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Bunk bed",
                "ru" => "Bunk bed",
                'fr' => "Bunk bed",
            ],
            "image" => "/images/common/icons/volume/75h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Baby bed",
                "ru" => "Baby bed",
                'fr' => "Baby bed",
            ],
            "image" => "/images/common/icons/volume/85h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Wardrobe 2 doors",
                "ru" => "Wardrobe 2 doors",
                'fr' => "Wardrobe 2 doors",
            ],
            "image" => "/images/common/icons/volume/76h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "3-doored wardrobe",
                "ru" => "3-doored wardrobe",
                'fr' => "3-doored wardrobe",
            ],
            "image" => "/images/common/icons/volume/86h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Toy chest",
                "ru" => "Toy chest",
                'fr' => "Toy chest",
            ],
            "image" => "/images/common/icons/volume/77h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Changing table",
                "ru" => "Changing table",
                'fr' => "Changing table",
            ],
            "image" => "/images/common/icons/volume/87h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Moving box",
                "ru" => "Moving box",
                'fr' => "Moving box",
            ],
            "image" => "/images/common/icons/volume/78h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Dressing table",
                "ru" => "Dressing table",
                'fr' => "Dressing table",
            ],
            "image" => "/images/common/icons/volume/79h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Dressing",
                "ru" => "Dressing",
                'fr' => "Dressing",
            ],
            "image" => "/images/common/icons/volume/80h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Office chair",
                "ru" => "Office chair",
                'fr' => "Office chair",
            ],
            "image" => "/images/common/icons/volume/81h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Trunk/canteen",
                "ru" => "Trunk/canteen",
                'fr' => "Trunk/canteen",
            ],
            "image" => "/images/common/icons/volume/88h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Pouf,footrest",
                "ru" => "Pouf,footrest",
                'fr' => "Pouf,footrest",
            ],
            "image" => "/images/common/icons/volume/89h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Wardrobe box",
                "ru" => "Wardrobe box",
                'fr' => "Wardrobe box",
            ],
            "image" => "/images/common/icons/volume/90h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Matress(single)",
                "ru" => "Matress(single)",
                'fr' => "Matress(single)",
            ],
            "image" => "/images/common/icons/volume/91h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Matress(double)",
                "ru" => "Matress(double)",
                'fr' => "Matress(double)",
            ],
            "image" => "/images/common/icons/volume/92h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Chamber")
        ]);


        //garden
        Subcategory::create([
            "title" => [
                "en" => "Garden table",
                "ru" => "Garden table",
                'fr' => "Garden table",
            ],
            "image" => "/images/common/icons/volume/93h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Garden chair",
                "ru" => "Garden chair",
                'fr' => "Garden chair",
            ],
            "image" => "/images/common/icons/volume/7h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Sunbath",
                "ru" => "Sunbath",
                'fr' => "Sunbath",
            ],
            "image" => "/images/common/icons/volume/95h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Parasol",
                "ru" => "Parasol",
                'fr' => "Parasol",
            ],
            "image" => "/images/common/icons/volume/96h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Barbecue(Coal)",
                "ru" => "Barbecue(Coal)",
                'fr' => "Barbecue(Coal)",
            ],
            "image" => "/images/common/icons/volume/97h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Barbecue(Electric)",
                "ru" => "Barbecue(Electric)",
                'fr' => "Barbecue(Electric)",
            ],
            "image" => "/images/common/icons/volume/98h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Barbecue(Stone)",
                "ru" => "Barbecue(Stone)",
                'fr' => "Barbecue(Stone)",
            ],
            "image" => "/images/common/icons/volume/99h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Arbor",
                "ru" => "Arbor",
                'fr' => "Arbor",
            ],
            "image" => "/images/common/icons/volume/100h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Plants(Small)",
                "ru" => "Plants(Small)",
                'fr' => "Plants(Small)",
            ],
            "image" => "/images/common/icons/volume/101h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Plants(Medium)",
                "ru" => "Plants(Medium)",
                'fr' => "Plants(Medium)",
            ],
            "image" => "/images/common/icons/volume/102h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Plants(Large)",
                "ru" => "Plants(Large)",
                'fr' => "Plants(Large)",
            ],
            "image" => "/images/common/icons/volume/103h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Mower",
                "ru" => "Mower",
                'fr' => "Mower",
            ],
            "image" => "/images/common/icons/volume/104h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Garden")
        ]);


        //Miscellaneous
        Subcategory::create([
            "title" => [
                "en" => "Upright piano",
                "ru" => "Upright piano",
                'fr' => "Upright piano",
            ],
            "image" => "/images/common/icons/volume/118h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Grand piano",
                "ru" => "Grand piano",
                'fr' => "Grand piano",
            ],
            "image" => "/images/common/icons/volume/119h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Pool table",
                "ru" => "Pool table",
                'fr' => "Pool table",
            ],
            "image" => "/images/common/icons/volume/120h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Babyfoot",
                "ru" => "Babyfoot",
                'fr' => "Babyfoot",
            ],
            "image" => "/images/common/icons/volume/121h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Table",
                "ru" => "Table",
                'fr' => "Table",
            ],
            "image" => "/images/common/icons/volume/68h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(120L)",
                "ru" => "Aquarium(120L)",
                'fr' => "Aquarium(120L)",
            ],
            "image" => "/images/common/icons/volume/123h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(180L)",
                "ru" => "Aquarium(180L)",
                'fr' => "Aquarium(180L)",
            ],
            "image" => "/images/common/icons/volume/124h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(240L)",
                "ru" => "Aquarium(240L)",
                'fr' => "Aquarium(240L)",
            ],
            "image" => "/images/common/icons/volume/125h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(300L)",
                "ru" => "Aquarium(300L)",
                'fr' => "Aquarium(300L)",
            ],
            "image" => "/images/common/icons/volume/126h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Aquarium(400L)",
                "ru" => "Aquarium(400L)",
                'fr' => "Aquarium(400L)",
            ],
            "image" => "/images/common/icons/volume/127h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Bodybuilding equipment (Exercise bike)",
                "ru" => "Bodybuilding equipment (Exercise bike)",
                'fr' => "Bodybuilding equipment (Exercise bike)",
            ],
            "image" => "/images/common/icons/volume/128h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Bodybuilding equipment (Treadmill)",
                "ru" => "Bodybuilding equipment (Treadmill)",
                'fr' => "Bodybuilding equipment (Treadmill)",
            ],
            "image" => "/images/common/icons/volume/129h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Wheelbarrow",
                "ru" => "Wheelbarrow",
                'fr' => "Wheelbarrow",
            ],
            "image" => "/images/common/icons/volume/130h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Ping pong table",
                "ru" => "Ping pong table",
                'fr' => "Ping pong table",
            ],
            "image" => "/images/common/icons/volume/131h.svg", 'position' => 0, 'is_active' => 1, 'volume' => 0.5,
            "object_category_id" => $this->getCategoryIdByTitle("Miscellaneous")
        ]);

        Subcategory::create([
            "title" => [
                "en" => "Volume 0-5",
                "ru" => "Volume 0-5",
                'fr' => "Volume 0-5",
            ],
            "image" => '/images/common/icons/category/default/3.svg',  'position' => 0, 'is_active' => 1, 'volume' => 5,
            "object_category_id" => $this->getCategoryIdByTitle("Caravans")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Volume 5-10",
                "ru" => "Volume 5-10",
                'fr' => "Volume 5-10",
            ],
            "image" => '/images/common/icons/category/default/3.svg',  'position' => 0, 'is_active' => 1, 'volume' => 10,
            "object_category_id" => $this->getCategoryIdByTitle("Caravans")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Volume 0-5",
                "ru" => "Volume 0-5",
                'fr' => "Volume 0-5",
            ],
            "image" => '/images/common/icons/category/default/3.svg',  'position' => 0, 'is_active' => 1, 'volume' => 5,
            "object_category_id" => $this->getCategoryIdByTitle("Trailers")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Volume 5-10",
                "ru" => "Volume 5-10",
                'fr' => "Volume 5-10",
            ],
            "image" => '/images/common/icons/category/default/3.svg',  'position' => 0, 'is_active' => 1, 'volume' => 10,
            "object_category_id" => $this->getCategoryIdByTitle("Trailers")
        ]);
        Subcategory::create([
            "title" => [
                "en" => "Volume 10-15",
                "ru" => "Volume 10-15",
                'fr' => "Volume 10-15",
            ],
            "image" => '/images/common/icons/category/default/3.svg',  'position' => 0, 'is_active' => 1, 'volume' => 10,
            "object_category_id" => $this->getCategoryIdByTitle("Trailers")
        ]);


        Subcategory::create([
            "title"=>[
                "en"=>"Cars and vans",
                "fr"=>"Cars and vans",
                "ru"=>"Cars and vans"
            ],
            "image" => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => 1,
            'volume' => 20,
            "object_category_id" => $this->getCategoryIdByTitle("Vehicle")
        ]);

        Subcategory::create([
            "title"=>[
                "en"=>"Recreational vehicles (RVs)",
                "fr"=>"Recreational vehicles (RVs)",
                "ru"=>"Recreational vehicles (RVs)",
            ],
            "image" => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => 1,
            'volume' => 20,
            "object_category_id" => $this->getCategoryIdByTitle("Vehicle")

        ]);

        Subcategory::create([
            "title"=>[
                "en"=>"Trailers",
                "fr"=>"Trailers",
                "ru"=>"Trailers",
            ],
            "image" => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => 1,
            'volume' => 20,
            "object_category_id" => $this->getCategoryIdByTitle("Vehicle")
        ]);

        Subcategory::create([
            "title"=>[
                "en"=>"Caravans",
                "fr"=>"Caravans",
                "ru"=>"Caravans",
            ],
            "image" => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => 1,
            'volume' => 20,
            "object_category_id" => $this->getCategoryIdByTitle("Vehicle")
        ]);

        Subcategory::create([
            "title"=>[
                "en"=>"Aircrafts",
                "fr"=>"Aircrafts",
                "ru"=>"Aircrafts",
            ],
            "image" => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => 1,
            'volume' => 20,
            "object_category_id" => $this->getCategoryIdByTitle("Vehicle")
        ]);

        Subcategory::create([
            "title"=>[
                "en"=>"Vintage vehicles",
                "fr"=>"Vintage vehicles",
                "ru"=>"Vintage vehicles",
            ],
            "image" => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => 1,
            'volume' => 20,
            "object_category_id" => $this->getCategoryIdByTitle("Vehicle")
        ]);

        Subcategory::create([
            "title"=>[
                "en"=>"HGVs and construction vehicles",
                "fr"=>"HGVs and construction vehicles",
                "ru"=>"HGVs and construction vehicles",
            ],
            "image" => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => 1,
            'volume' => 20,
            "object_category_id" => $this->getCategoryIdByTitle("Vehicle")
        ]);

        Subcategory::create([
            "title"=>[
                "en"=>"Tractors and agricultural equipment",
                "fr"=>"Tractors and agricultural equipment",
                "ru"=>"Tractors and agricultural equipment",
            ],
            "image" => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => 1,
            'volume' => 20,
            "object_category_id" => $this->getCategoryIdByTitle("Vehicle")
        ]);

        Subcategory::create([
            "title"=>[
                "en"=>"Other vehicles",
                "fr"=>"Other vehicles",
                "ru"=>"Other vehicles",
            ],
            "image" => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => 1,
            'volume' => 20,
            "object_category_id" => $this->getCategoryIdByTitle("Vehicle")
        ]);
    }
}
