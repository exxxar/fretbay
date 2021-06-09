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
        $category = Category::create([
            'title' => [
                "en" => "Household equipment",
                "ru" => "Household equipment",
                'fr' => "Household equipment",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/1.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'article'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "length")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "width")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "height")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "weight")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "quantity")->first(),['required' => true]);


        Category::create([
            'title' => [
                "en" => "Moving",
                "ru" => "Moving",
                'fr' => "Moving",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/2.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'calculator'
        ]);

        $category = Category::create([
            'title' => [
                "en" => "Vehicle",
                "ru" => "Vehicle",
                'fr' => "Vehicle",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/3.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'grid'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "make")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "model")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "estimated_value")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "moving_vehicle")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "accept_conveyors")->first(),['required' => true]);


        $category = Category::create([
            'title' => [
                "en" => "Motorcycles and sports vehicles",
                "ru" => "Motorcycles and sports vehicles",
                'fr' => "Motorcycles and sports vehicles",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/17.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'article'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "make")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "model")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "estimated_value")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "moving_vehicle")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "accept_conveyors")->first(),['required' => true]);

        $category = Category::create([
            'title' => [
                "en" => "Boats & voluminous",
                "ru" => "Boats & voluminous",
                'fr' => "Boats & voluminous",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/5.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'article'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "length")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "width")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "height")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "weight")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "quantity")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "make")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "model")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "estimated_value")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "accept_conveyors")->first(),['required' => true]);

        $category = Category::create([
            'title' => [
                "en" => "Fragile goods",
                "ru" => "Fragile goods",
                'fr' => "Fragile goods",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/13.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'article'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "length")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "width")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "height")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "weight")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "quantity")->first(),['required' => true]);

        $category = Category::create([
            'title' => [
                "en" => "Package/Fold",
                "ru" => "Package/Fold",
                'fr' => "Package/Fold",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/18.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'article'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "length")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "width")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "height")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "weight")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "quantity")->first(),['required' => true]);


        $category = Category::create([
            'title' => [
                "en" => "Pallet",
                "ru" => "Pallet",
                'fr' => "Pallet",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/19.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'article'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "height")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "weight")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "quantity")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "fragile_goods")->first(),['required' => false]);

       $category =  Category::create([
            'title' => [
                "en" => "Animals",
                "ru" => "Animals",
                'fr' => "Animals",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/11.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => ''
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "animal_bread")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "weight")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "quantity")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "special_needs")->first(),['required' => false]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "vaccinations_date")->first(),['required' => false]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "length")->first(),['required' => false]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "width")->first(),['required' => false]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "height")->first(),['required' => false]);


       $category =  Category::create([
            'title' => [
                "en" => "Agri-food",
                "ru" => "Agri-food",
                'fr' => "Agri-food",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/14.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'article'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "weight")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "quantity")->first(),['required' => true]);

        $category = Category::create([
            'title' => [
                "en" => "Commercial goods",
                "ru" => "Commercial goods",
                'fr' => "Commercial goods",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/9.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'article'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "length")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "width")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "height")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "weight")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "quantity")->first(),['required' => true]);


        $category = Category::create([
            'title' => [
                "en" => "Miscellaneous",
                "ru" => "Miscellaneous",
                'fr' => "Miscellaneous",
            ],
            'min_price' => 0,
            'additional_menu_title' => 'choice_of_category',
            'image' => '/images/common/icons/category/default/6.svg',
            'position' => 0,
            'is_active' => true,
            'mode' => 'article'
        ]);

        //$category->properties()->attach(\App\CategoryProperty::where("slug", "article_name")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "length")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "width")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "height")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "weight")->first(),['required' => true]);
        $category->properties()->attach(\App\CategoryProperty::where("slug", "quantity")->first(),['required' => true]);

    }
}
