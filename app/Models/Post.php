<?php

namespace App\Models;

use App\Events\LogEventAction;
use App\Events\PostActionEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;
use Livewire\Livewire;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable, LogsActivity;
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

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($post) {
            if ($post->isDirty('slug')) {
                DB::table('old_slugs')->insert([
                    'post_id' => $post->id,
                    'slug' => $post->getOriginal('slug'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
    
    public function tapActivity(Activity $activity, string $eventName)
    {
        if ($eventName == 'deleted') {
            $activity->properties = $this->attributes;
        }
    }
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Postingan')
            ->logFillable('*')
            ->setDescriptionForEvent(function(string $eventName) {
                $aksi = '';
                switch ($eventName) {
                    case 'created':
                        $aksi = 'dibuat';
                        break;
                    case 'updated':
                        $aksi = 'diperbarui';
                        break;
                    case 'deleted':
                        $aksi = 'dihapus';
                        break;
                }
                return "Data Postingan telah {$aksi}";
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
            ->whereRaw(
                "(LOWER(title) LIKE ? OR LOWER(status) LIKE ?)",
                ["%{$search}%", "%{$search}%"]
            )
            ->orWhereHas('category', function ($q) use ($search) {
                $q->whereRaw("LOWER(name) LIKE ?", ["%{$search}%"]);
            })
            ->orWhereHas('user', function ($q) use ($search) {
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
    
    public function media()
    {
        return $this->hasMany(FilePostMedia::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_likes');
    }
}
