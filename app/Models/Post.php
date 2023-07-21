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

    // public function mostViewed($limit = 5)
    // {
    //     return $this->orderBy('views', 'desc')->take($limit)->get();
    // }

    public static function mostViewed($posts, $limit = 5, $category = null)
    {
        $filteredPosts = $posts;
    
        if ($category) {
            $filteredPosts = $filteredPosts->filter(function ($post) use ($category) {
                return $post->category->name == $category;
            });
        }
        
        return $filteredPosts->sortByDesc('views')->take($limit);
    }

    public function mostViewed2($limit = 5, $category = null)
    {
        $filteredPosts = $this;
        
        if ($category) {
            $filteredPosts = $filteredPosts->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        }
        
        return $filteredPosts->sortByDesc('views')->take($limit);
    }

    // Eloquent Relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(PostTag::class)->withTimestamps();
    }
}
