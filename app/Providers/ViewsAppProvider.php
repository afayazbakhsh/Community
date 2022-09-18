<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Support\Facades\View;
class ViewsAppProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('newCommunities', Community::withCount(['posts'])->latest()->take(10)->get());
        View::share('newPosts', Post::latest()->take(10)->get());
    }
}
