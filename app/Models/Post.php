<?php

namespace App\Models;

use App\Events\LogEventAction;
use App\Events\PostActionEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
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

    /**
     * Get the index name for the model.
    */
    /* public function searchableAs()
    {
        return 'post_index';
    }  */

    public static function clearCache()
    {
        cache()->forget('posts');
        cache()->forget('postsCount');
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

    public function scopeWithCategory($query, $categoryName = null)
    {
        if ($categoryName) {
            $data = $query->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            });
            return $data;
        } else {
            // Get all categories
            return Category::oldest('name');
        }
    }

    public function scopeGlobalSearch($query, $search)  
    {
        $search = strtolower($search);
        
        return $query
        ->whereRaw("(LOWER(title) LIKE ? OR LOWER(status) LIKE ?)", 
        ["%{$search}%", "%{$search}%"]) 
        ->orWhereHas('category', function($q) use ($search){
           $q->whereRaw("LOWER(name) LIKE ?", ["%{$search}%"]); 
         })
        ->orWhereHas('user', function($q) use ($search){
           $q->whereRaw("LOWER(name) LIKE ?", ["%{$search}%"]);
         });
    }


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

    public function files()
    {
        return $this->hasMany(FilePost::class);
    }
}
