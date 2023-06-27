<?php

namespace App\Models;

use App\Events\LogEventAction;
use App\Events\TagActionEvent;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $table = 'tags';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function clearCache()
    {
        cache()->forget('tags');
        cache()->forget('tagsCount');
    }

    public static function boot()
    {
        parent::boot();

        static::created(function (Tag $tag) {
            event(new LogEventAction('created', $tag));
            event(new TagActionEvent($tag));
        });

        static::updated(function (Tag $tag) {
            event(new LogEventAction('updated', $tag));
            event(new TagActionEvent($tag));
        });

        static::deleted(function (Tag $tag) {
            event(new LogEventAction('deleted', $tag));
            event(new TagActionEvent($tag));
        });
    }

    public function posts()
    {
        // belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id')
        return $this->belongsToMany(Post::class)->using(PostTag::class)->withTimestamps();
    }
}
