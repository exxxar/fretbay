<?php

use App\Models\ObjectCategory;
use Illuminate\Database\Seeder;

class ObjectCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        ObjectCategory::truncate();

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
            ObjectCategory::create([
                "title" => $category
            ]);
        }
    }
}
