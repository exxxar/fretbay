<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Category::create([
         'title'=>[
             "en" => "Household equipment",
             "ru" => "Household equipment",
             'fr' => "Household equipment",
         ],
         'min_price'=>0,
         'additional_menu_title'=>null,
         'image'=>'/images/common/icons/category/default/1.svg',
         'position'=>0,
         'is_active'=>true,
         'mode'=>''
     ]);
    }
}
