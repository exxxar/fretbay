<?php

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            $profile = Profile::create();

            $user = User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'profile_id'        => $profile->id,
            ]);

            $user->roles()->attach($role->id);

            $role = Role::where('name', 'transporter')->firstOrFail();
            $profile = Profile::create();

            $user = User::create([
                'name'           => 'Transporter',
                'email'          => 'transporter@transporter.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'profile_id'        => $profile->id,
            ]);
            $user->roles()->attach($role->id);

            $role = Role::where('name', 'customer')->firstOrFail();
            $profile = Profile::create();

            $user = User::create([
                'name'           => 'Customer',
                'email'          => 'customer@customer.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'profile_id'        => $profile->id,
            ]);
            $user->roles()->attach($role->id);


        }
    }
}
