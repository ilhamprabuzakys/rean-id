<?php

namespace App\Listeners;

use App\Events\CategoryActionEvent;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CategoryCacheListener
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
    public function handle(CategoryActionEvent $event): void
    {
        Post::clearCache();
        Category::clearCache();
        Tag::clearCache();
    }
}
