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
        $user3 = User::create([
            "name" => "Editor 2",
            "email" => "editor2@gmail.com",
            "password" => Hash::make("1234"),
        ]);
        $user4 = User::create([
            "name" => "Editor 3",
            "email" => "editor3@gmail.com",
            "password" => Hash::make("1234"),
        ]);

        $user5 = User::create([
            "name" => "Demo User 1",
            "email" => "demouser1@gmail.com",
            "password" => Hash::make("1234"),
        ]);

        $user6 = User::create([
            "name" => "Demo User 2",
            "email" => "demouser2@gmail.com",
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
        $user2->roles()->attach($role2);
        $user3->roles()->attach($role2);
        $user4->roles()->attach($role2);
        $user5->roles()->attach($role3);
        $user6->roles()->attach($role3);


        $user1->posts()->create([
            "title" => "post 1",
            "body" => "body 1"
        ]);
        $user1->posts()->create([
            "title" => "post 2",
            "body" => "body 2"
        ]);
        $user2->posts()->create([
            "title" => "post 3",
            "body" => "body 3"
        ]);
        $user2->posts()->create([
            "title" => "post 4",
            "body" => "body 4"
        ]);
        $user3->posts()->create([
            "title" => "post 5",
            "body" => "body 5"
        ]);
        $user3->posts()->create([
            "title" => "post 6",
            "body" => "body 6"
        ]);
        $user4->posts()->create([
            "title" => "post 7",
            "body" => "body 7"
        ]);
        $user4->posts()->create([
            "title" => "post 8",
            "body" => "body 8"
        ]);
        $user5->posts()->create([
            "title" => "post 9",
            "body" => "body 9"
        ]);
        $user6->posts()->create([
            "title" => "post 10",
            "body" => "body 10"
        ]);


    }
}
