<?php

namespace Database\Seeders;

use App\Models\Posts;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1  = new User();
        $user1->name = "Rony";
        $user1->email = "rony@gmail.com";
        $user1->password = Hash::make("1234");
        $user1->save();

        $user2 = User::create([
       "name" => "Rabbi",
       "email" => "rabbi@gmail.com",
        "password" => Hash::make("1234"),
    ]);

        $role1 = Role::create([
            "name" => "ROLE_ADMIN",
        ]);
        $role2 = Role::create([
            "name" => "ROLE_EDITOR",
        ]);
        $role3 = Role::create([
            "name" => "ROLE_USER",
        ]);
        $user1->roles()->attach($role1);
        $user2->roles()->attach($role3);


    }
}
