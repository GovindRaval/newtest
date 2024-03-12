<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        for($i = 0; $i < 100; $i ++)
        {
        $user =new user();
        $user->name =fake()->name;
        $user->email =fake()->safeEmail;
        $user->password =fake()->password;
        $user->save();
        }
    }
}
