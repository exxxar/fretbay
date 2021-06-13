<?php

use App\Models\VerificationApplication;
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
        factory(VerificationApplication::class, 5)->create();
    }
}
