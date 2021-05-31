<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new Role();
        $admin->name = 'Administrator';
        $admin->slug = 'admin';
        $admin->save();

        $customer = new Role();
        $customer->name = 'Customer';
        $customer->slug = 'customer';
        $customer->save();

        $transporter = new Role();
        $transporter->name = 'Transporter';
        $transporter->slug = 'transporter';
        $transporter->save();
    }
}
