<?php

use App\Models\Permission;
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

        $developer = Role::where('slug', 'web-developer')->first();
        $manager = Role::where('slug', 'project-manager')->first();
        $createTasks = Permission::where('slug', 'create-tasks')->first();
        $manageUsers = Permission::where('slug', 'manage-users')->first();

        $user1 = new User();
        $user1->name = 'Jhon Deo';
        $user1->email = 'jhon@deo.com';
        $user1->password = bcrypt('secret');
        $user1->phone = '1234567890';
        $user1->profile_id = 1;
        $user1->save();
        $user1->roles()->attach($developer);
        $user1->permissions()->attach($createTasks);

        $user2 = new User();
        $user2->name = 'Mike Thomas';
        $user2->email = 'mike@thomas.com';
        $user2->password = bcrypt('secret');
        $user2->phone = '0987654321';
        $user2->profile_id = 2;
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($manageUsers);

    }
}
