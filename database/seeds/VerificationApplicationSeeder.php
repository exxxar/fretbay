<?php

use Illuminate\Database\Seeder;

class VerificationApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\VerificationApplication::class, 5)->create();
    }
}
