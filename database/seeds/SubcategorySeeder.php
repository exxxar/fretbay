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
        $categories = [
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

        foreach ($categories as $category) {
            Subcategory::create([
                "title" => $category,
                "image" => "",
                "category_id" => $this->getCategoryIdByTitle("Moving")
                , 'position' => 0,
                'is_active' => true
            ]);
        }
    }
}
