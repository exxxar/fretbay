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

//        Role::truncate();

        $manager = new Role();
        $manager->name = 'Project Manager';
        $manager->slug = 'project-manager';
        $manager->save();

        $developer = new Role();
        $developer->name = 'Web Developer';
        $developer->slug = 'web-developer';
        $developer->save();

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
