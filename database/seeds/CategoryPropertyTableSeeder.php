<?php

use Illuminate\Database\Seeder;

class CategoryPropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////Article name, Length (cm), width (cm), height (cm), weight, quantity, make, model, estimated value, accept conveyors, fragile goods
        ///special needs, vaccinations up to date, animal bread

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Article name",
                "fr"=>"Article name",
                "ru"=>"Article name"
            ],
            'slug'=>'article_name',
            'type'=>'text',
            'icon'=>null,
        ]);


        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Width (cm)",
                "fr"=>"Width (cm)",
                "ru"=>"Width (cm)"
            ],
            'slug'=>'width',
            'type'=>'number',
            'icon'=>'/images/common/icons/units/largeur.svg',
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Length (cm)",
                "fr"=>"Length (cm)",
                "ru"=>"Length (cm)"
            ],
            'slug'=>'length',
            'type'=>'number',
            'icon'=>'/images/common/icons/units/longeur.svg',
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Height (cm)",
                "fr"=>"Height (cm)",
                "ru"=>"Height (cm)"
            ],
            'slug'=>'height',
            'type'=>'number',
            'icon'=>'/images/common/icons/units/hauteur.svg',
        ]);


        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Weight",
                "fr"=>"Weight",
                "ru"=>"Weight"
            ],
            'slug'=>'weight',
            'type'=>'number',
            'icon'=>'/images/common/icons/units/poids.svg',
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Quantity",
                "fr"=>"Quantity",
                "ru"=>"Quantity"
            ],
            'slug'=>'quantity',
            'type'=>'number',
            'icon'=>'/images/common/icons/units/quantity.svg',
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Make",
                "fr"=>"Make",
                "ru"=>"Make"
            ],
            'slug'=>'make',
            'type'=>'text',
            'icon'=>null,
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Model",
                "fr"=>"Model",
                "ru"=>"Model"
            ],
            'slug'=>'model',
            'type'=>'text',
            'icon'=>null,
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Estimated value",
                "fr"=>"Estimated value",
                "ru"=>"Estimated value"
            ],
            'slug'=>'estimated_value',
            'type'=>'number',
            'icon'=>'/images/common/icons/units/euro.svg',
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"I accept conveyors",
                "fr"=>"I accept conveyors",
                "ru"=>"I accept conveyors"
            ],
            'slug'=>'accept_conveyors',
            'type'=>'radio',
            'icon'=>null,
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Fragile goods",
                "fr"=>"Fragile goods",
                "ru"=>"Fragile goods"
            ],
            'slug'=>'fragile_goods',
            'type'=>'check',
            'icon'=>null,
        ]);


        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Special needs",
                "fr"=>"Special needs",
                "ru"=>"Special needs"
            ],
            'slug'=>'special_needs',
            'type'=>'text',
            'icon'=>'/images/common/icons/units/need.svg',
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Are the vaccinations up to date?",
                "fr"=>"Are the vaccinations up to date?",
                "ru"=>"Are the vaccinations up to date?"
            ],
            'slug'=>'vaccinations_date',
            'type'=>'date',
            'icon'=>'/images/common/icons/units/vaccine.svg',
        ]);

        \App\CategoryProperty::create([
            'title'=>[
                "en"=>"Moving vehicle?",
                "fr"=>"Moving vehicle?",
                "ru"=>"Moving vehicle?"
            ],
            'slug'=>'moving_vehicle',
            'type'=>'radio',
            'icon'=>null,
        ]);
    }
}
