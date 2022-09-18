<?php

namespace App\Listeners\Post;

use App\Events\post\CreatePostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Classes\ImageMaker;
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

        $image_path = $event->post->id.'/thumpnail_'.$event->request->file('post_image')->getClientOriginalName();

        Log::info("start making image");
        $image = ImageMaker::makeAndStore($event->request->file('post_image'),$image_path);

        // $event->post->update(['post_image'=> $path]);


    }
}
