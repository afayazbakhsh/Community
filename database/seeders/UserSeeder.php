<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            User::factory([
                'name'=>'amir',
                'email'=>'a.fayazbakhsh1@gmail.com',
                'password'=> bcrypt('password'),
                'email_verified_at'=> now(),
                'is_admin'=>true
            ])->create();
            User::factory()->times(100)->create();

    }
}
