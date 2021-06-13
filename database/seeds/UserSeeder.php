<?php

use App\Models\Permission;
use App\Models\Profile;
use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $admin = Role::where('slug', 'admin')->first();
        $transporter = Role::where('slug', 'transporter')->first();
        $customer = Role::where('slug', 'customer')->first();
        $manageUsers = Permission::where('slug', 'manage-users')->first();

        $profile = Profile::create();

        $user3 = new User();
        $user3->name = 'Test';
        $user3->email = 'customer@customer.com';
        $user3->password = bcrypt('password');
        $user3->phone = '1236';
        $user3->profile_id = $profile->id;
        $user3->save();
        $user3->roles()->attach($customer);
        $user3->permissions()->attach($manageUsers);

        $profile2 = Profile::create();
        $user4 = new User();
        $user4->name = 'Test';
        $user4->email = 'transporter@transporter.com';
        $user4->password = bcrypt('password');
        $user4->phone = '12345';
        $user4->profile_id = $profile2->id;
        $user4->save();
        $user4->roles()->attach($transporter);
        $user4->permissions()->attach($manageUsers);

        $profile3 = Profile::create();
        $user5 = new User();
        $user5->name = 'Test';
        $user5->email = 'admin@admin.com';
        $user5->password = bcrypt('password');
        $user5->phone = '123456';
        $user5->profile_id = $profile3->id;
        $user5->save();
        $user5->roles()->attach($admin);
        $user5->permissions()->attach($manageUsers);

    }
}
