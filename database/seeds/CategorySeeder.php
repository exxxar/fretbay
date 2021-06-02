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
         'additional_menu_title'=>'choice_of_category',
         'image'=>'/images/common/icons/category/default/1.svg',
         'position'=>0,
         'is_active'=>true,
         'mode'=>''
     ]);

        Category::create([
            'title'=>[
                "en" => "Moving",
                "ru" => "Moving",
                'fr' => "Moving",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/2.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);

        Category::create([
            'title'=>[
                "en" => "Vehicle",
                "ru" => "Vehicle",
                'fr' => "Vehicle",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/3.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);


        Category::create([
            'title'=>[
                "en" => "Motorcycles and sports vehicles",
                "ru" => "Motorcycles and sports vehicles",
                'fr' => "Motorcycles and sports vehicles",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/17.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);

        Category::create([
            'title'=>[
                "en" => "Boats & voluminous",
                "ru" => "Boats & voluminous",
                'fr' => "Boats & voluminous",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/5.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);

        Category::create([
            'title'=>[
                "en" => "Fragile goods",
                "ru" => "Fragile goods",
                'fr' => "Fragile goods",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/13.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);

        Category::create([
            'title'=>[
                "en" => "Package/Fold",
                "ru" => "Package/Fold",
                'fr' => "Package/Fold",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/18.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);


        Category::create([
            'title'=>[
                "en" => "Pallet",
                "ru" => "Pallet",
                'fr' => "Pallet",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/19.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);

        Category::create([
            'title'=>[
                "en" => "Animals",
                "ru" => "Animals",
                'fr' => "Animals",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/11.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);


        Category::create([
            'title'=>[
                "en" => "Agri-food",
                "ru" => "Agri-food",
                'fr' => "Agri-food",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/14.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);

        Category::create([
            'title'=>[
                "en" => "Commercial goods",
                "ru" => "Commercial goods",
                'fr' => "Commercial goods",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/9.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);

        Category::create([
            'title'=>[
                "en" => "Miscellaneous",
                "ru" => "Miscellaneous",
                'fr' => "Miscellaneous",
            ],
            'min_price'=>0,
            'additional_menu_title'=>'choice_of_category',
            'image'=>'/images/common/icons/category/default/6.svg',
            'position'=>0,
            'is_active'=>true,
            'mode'=>''
        ]);
    }
}
