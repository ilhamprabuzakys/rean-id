<?php

namespace App\Listeners;

use App\Events\PostActionEvent;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostCacheListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostActionEvent $event): void
    {
        Post::clearCache();
        Category::clearCache();
        Tag::clearCache();
    }
}
