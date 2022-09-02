<?php

namespace App\Listeners\Post;

use App\Events\post\CreatePostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Image;
class CompressPostImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreatePostEvent  $event
     * @return void
     */
    public function handle(CreatePostEvent $event)
    {

        $image = 'thumpnail_'.$event->input->file('post_image')->getClientOriginalName();

        $event->input->file('post_image')->storeAS('public/posts/'.$event->post->id, $image);

        if($event->post->post_image != ''){

            unlink(storage_path('app/public/posts/'.$event->post->id.'/'.$event->post->post_image));
        }

        $event->post->update(['post_image'=> $image]);

        $img = Image::make(storage_path('app/public/posts/'.$event->post->id.'/'.$image));
        $img->resize(400, 500);

        // $img->resize(300, 300, function ($constraint) {
        //     $constraint->aspectRatio();
        // });

        $img->save(storage_path('app/public/posts/'.$event->post->id.'/'.$image),60);
    }
}
