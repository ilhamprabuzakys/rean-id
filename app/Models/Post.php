<?php

namespace App\Models;

use App\Events\LogEventAction;
use App\Events\PostActionEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $table = 'posts';


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function clearCache()
    {
        Cache::forget('posts');
        Cache::forget('postsCount');
    }

    public static function boot()
    {
        parent::boot();

        static::created(function (Post $post) {
            event(new LogEventAction('created', $post));
            event(new PostActionEvent($post));
        });

        static::updated(function (Post $post) {
            event(new LogEventAction('updated', $post));
            event(new PostActionEvent($post));
        });

        static::deleted(function (Post $post) {
            event(new LogEventAction('deleted', $post));
            event(new PostActionEvent($post));
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(PostTag::class)->withTimestamps();
    }
}
