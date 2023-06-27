<?php

namespace App\Models;

use App\Events\LogEventAction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    use HasFactory;
    protected $table = 'post_tag';

    public static function boot()
    {
        parent::boot();

        static::created(function (PostTag $postTag) {
            // event(new LogEventAction('created', $postTag));
        });

        static::updated(function (PostTag $postTag) {
            // event(new LogEventAction('updated', $postTag));
        });

        static::deleted(function (PostTag $postTag) {
            // event(new LogEventAction('deleted', $postTag));
        });
    }
}
