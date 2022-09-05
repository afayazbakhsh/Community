<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserProfile;
class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserProfile::create([
            'address'=>'amir',
            'phone'=>'testphone',
            'link'=> "hi body",
            'bio'=> "hi bowwwwdy",
            'user_id'=> 102,
        ]);
    }

}
