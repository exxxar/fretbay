<?php


use App\Models\TypeOfTransport;
use Illuminate\Database\Seeder;

class TypeOfTransportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        TypeOfTransport::truncate();

        TypeOfTransport::create([
            "title" => [
                "en" => "Household equipment",
                "ru" => "Household equipment",
                "fr" => "Équipement de la maison",
            ],
            "img" => "/images/common/icons/category/default/1.svg"
        ]);

        TypeOfTransport::create([
            "title" => [
                "en" => "Moving",
                "ru" => "Moving",
                "fr" => "Déménagements",
            ],
            "img" => "/images/common/icons/category/default/2.svg"
        ]);

        TypeOfTransport::create([
            "title" => [
                "en" => "Vehicle",
                "ru" => "Vehicle",
                "fr" => "Véhicule",
            ],
            "img" => "/images/common/icons/category/default/3.svg"
        ]);

        TypeOfTransport::create([
            "title" => [
                "en" => "Motorcycles and sports vehicles",
                "ru" => "Motorcycles and sports vehicles",
                "fr" => "Motorcycles and sports vehicles",
            ],
            "img" => "/images/common/icons/category/default/17.svg"
        ]);

        TypeOfTransport::create([
            "title" => [
                "en" => "Boats & voluminous",
                "ru" => "Boats & voluminous",
                "fr" => "Boats & voluminous",
            ],
            "img" => "/images/common/icons/category/default/5.svg"
        ]);

        TypeOfTransport::create([
            "title" =>

                [
                    "en" => "Fragile goods",
                    "ru" => "Fragile goods",
                    "fr" => "Fragile goods",
                ],
            "img" => "/images/common/icons/category/default/13.svg"
        ]);

        TypeOfTransport::create([
            "title" =>
                [
                    "en" => "Package/Fold",
                    "ru" => "Package/Fold",
                    "fr" => "Package/Fold",
                ],
            "img" => "/images/common/icons/category/default/18.svg"
        ]);

        TypeOfTransport::create([
            "title" =>
                [
                    "en" => "Pallet",
                    "ru" => "Pallet",
                    "fr" => "Pallet",
                ],
            "img" => "/images/common/icons/category/default/19.svg"
        ]);


        TypeOfTransport::create([
            "title" =>
                [
                    "en" => "Animals",
                    "ru" => "Animals",
                    "fr" => "Animals",
                ],
            "img" => "/images/common/icons/category/default/11.svg"
        ]);

        TypeOfTransport::create([
            "title" =>
                [
                    "en" => "Agri-food",
                    "ru" => "Agri-food",
                    "fr" => "Agri-food",
                ],
            "img" => "/images/common/icons/category/default/14.svg"
        ]);

        TypeOfTransport::create([
            "title" =>
                [
                    "en" => "Commercial goods",
                    "ru" => "Commercial goods",
                    "fr" => "Commercial goods",
                ],
            "img" => "/images/common/icons/category/default/9.svg"
        ]);

        TypeOfTransport::create([
            "title" =>
                [
                    "en" => "Miscellaneous",
                    "ru" => "Miscellaneous",
                    "fr" => "Miscellaneous",
                ],
            "img" => "/images/common/icons/category/default/6.svg"
        ]);
    }
}
