<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Community;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        foreach(Post::all() as $post){

            $post->tags()->create([
                'name' => fake()->name(),
            ]);
        }

        foreach(Community::all() as $community){

            $community->tags()->create([
                'name' => fake()->name(),
            ]);
        }

    }
}
