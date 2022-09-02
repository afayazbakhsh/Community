<?php

namespace App\Observers;

use App\Models\Topic;
use Illuminate\Support\Facades\Cache;

class TopicObserver
{
    /**
     * Handle the Topic "created" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function created(Topic $topic)
    {
        Cache::forget('topics');
        Cache::forever('topics',Topic::all());
    }

    /**
     * Handle the Topic "updated" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function updated(Topic $topic)
    {
        Cache::forget('topics');
        Cache::forever('topics',Topic::all());
    }

    /**
     * Handle the Topic "deleted" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function deleted(Topic $topic)
    {
        Cache::forget('topics');
        Cache::forever('topics',Topic::all());
    }

    /**
     * Handle the Topic "restored" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function restored(Topic $topic)
    {
        //
    }

    /**
     * Handle the Topic "force deleted" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function forceDeleted(Topic $topic)
    {
        //
    }
}
