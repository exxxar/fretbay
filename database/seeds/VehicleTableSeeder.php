<?php

use App\Vehicle;
use Illuminate\Database\Seeder;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Vehicle::truncate();

        Vehicle::create([
            "title"=>[
                "en"=>"Cars and vans",
                "fr"=>"Cars and vans",
                "ru"=>"Cars and vans"
            ]
        ]);

        Vehicle::create([
            "title"=>[
                "en"=>"Recreational vehicles (RVs)",
                "fr"=>"Recreational vehicles (RVs)",
                "ru"=>"Recreational vehicles (RVs)",
            ]
        ]);

        Vehicle::create([
            "title"=>[
                "en"=>"Trailers",
                "fr"=>"Trailers",
                "ru"=>"Trailers",
            ]
        ]);

        Vehicle::create([
            "title"=>[
                "en"=>"Caravans",
                "fr"=>"Caravans",
                "ru"=>"Caravans",
            ]
        ]);

        Vehicle::create([
            "title"=>[
                "en"=>"Aircrafts",
                "fr"=>"Aircrafts",
                "ru"=>"Aircrafts",
            ]
        ]);

        Vehicle::create([
            "title"=>[
                "en"=>"Vintage vehicles",
                "fr"=>"Vintage vehicles",
                "ru"=>"Vintage vehicles",
            ]
        ]);

        Vehicle::create([
            "title"=>[
                "en"=>"HGVs and construction vehicles",
                "fr"=>"HGVs and construction vehicles",
                "ru"=>"HGVs and construction vehicles",
            ]
        ]);

        Vehicle::create([
            "title"=>[
                "en"=>"Tractors and agricultural equipment",
                "fr"=>"Tractors and agricultural equipment",
                "ru"=>"Tractors and agricultural equipment",
            ]
        ]);

        Vehicle::create([
            "title"=>[
                "en"=>"Other vehicles",
                "fr"=>"Other vehicles",
                "ru"=>"Other vehicles",
            ]
        ]);
    }
}
