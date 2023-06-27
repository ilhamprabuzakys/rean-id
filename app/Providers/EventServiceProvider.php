<?php

namespace App\Providers;

use App\Events\CategoryActionEvent;
use App\Events\LogEventAction;
use App\Events\PostActionEvent;
use App\Events\TagActionEvent;
use App\Listeners\CategoryCacheListener;
use App\Listeners\ModelActionListener;
use App\Listeners\PostCacheListener;
use App\Listeners\TagCacheListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        LogEventAction::class => [
            ModelActionListener::class,
        ],
        PostActionEvent::class => [
            PostCacheListener::class,
        ],
        CategoryActionEvent::class => [
            CategoryCacheListener::class,
        ],
        TagActionEvent::class => [
            TagCacheListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
