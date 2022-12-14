<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create(['name'=>'Redis']);
        Topic::create(['name'=>'Database']);
        Topic::create(['name'=>'DesignPattern']);
        Topic::create(['name'=>'Laravel']);
    }
}
