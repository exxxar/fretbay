<?php

use App\Models\Category;
use App\Models\Subcategory;
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
        $subcategories = [
            [
                'en' => 'Entrance',
                'ru' => 'Прихожая',
                'fr'=>'',
            ],

            [
                'en' => 'Bathroom',
                'ru' => 'Ванная',
                'fr'=>'',
            ],

            [
                'en' => 'Living room',
                'ru' => 'Комната отдыха',
                'fr'=>'',
            ],

            [
                'en' => 'Kitchen',
                'ru' => 'Кухня',
                'fr'=>'',
            ],

            [
                'en' => 'Dining room',
                'ru' => 'Столовая',
                'fr'=>'',
            ],

            [
                'en' => 'Chamber',
                'ru' => 'Зал',
                'fr'=>'',
            ],

            [
                'en' => 'Garden',
                'ru' => 'Гараж',
                'fr'=>'',
            ],

            [
                'en' => 'Miscellaneous',
                'ru' => 'Другое',
                'fr'=>'',
            ],

        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create([
                "title" => $subcategory,
                "image" => "",
                "category_id" => $this->getCategoryIdByTitle("Moving"),
                'position' => 0,
                'is_active' => true
            ]);
        }
        $subcategories = [
            [
                'en' => 'Cars and vans',
                'ru' => 'Cars and vans',
                'fr'=> 'Cars and vans',
            ],
            [
                'en' => 'Recreational vehicles (RVs)',
                'ru' => 'Recreational vehicles (RVs)',
                'fr'=> 'Recreational vehicles (RVs)',
            ],
            [
                'en' => 'Trailers',
                'ru' => 'Trailers',
                'fr'=> 'Trailers',
            ],
            [
                'en' =>  'Caravans',
                'ru' =>  'Caravans',
                'fr'=>  'Caravans',
            ],
            [
                'en' =>   'Vehicle spare parts',
                'ru' =>   'Vehicle spare parts',
                'fr'=>   'Vehicle spare parts',
            ],
            [
                'en' => 'Aircrafts',
                'ru' => 'Aircrafts',
                'fr'=> 'Aircrafts',
            ],
            [
                'en' => 'HGVs and construction vehicles',
                'ru' => 'HGVs and construction vehicles',
                'fr'=> 'HGVs and construction vehicles',
            ],
            [
                'en' => 'Tractors and agricultural equipment',
                'ru' => 'Tractors and agricultural equipment',
                'fr'=>  'Tractors and agricultural equipment',
            ],

// 'Vintage vehicles'
//'Other vehicles'
    ];
        foreach ($subcategories as $subcategory) {
            Subcategory::create([
                "title" => $subcategory,
                'image' => '/images/common/icons/category/default/3.svg',
                "category_id" => $this->getCategoryIdByTitle("Vehicle"),
                'position' => 0,
                'is_active' => true
            ]);
        }
    }
}
