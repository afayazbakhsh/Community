<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostVote;
use App\Models\Post;

class PostVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach($posts as $post)
        {

        $vote = new PostVote;
        $vote->user_id = 1;
        $vote->post_id = $post->id;
        $vote->vote = rand(1,10);
        $vote->save();
            $post->update([

                'vote_id' => $vote->id,
            ]);
        }
    }
}
