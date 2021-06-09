<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoryPropertyTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ThingSeeder::class);
        $this->call(OrderTableSeeder::class);

//
//        $this->call(TypeOfTransportTableSeeder::class);
//        $this->call(ObjectCategoryTableSeeder::class);
        // $this->call(TypeOfObjectTableSeeder::class);
        // $this->call(VehicleTableSeeder::class);
    }
}
