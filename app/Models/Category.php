<?php

namespace App\Models;

use App\Events\CategoryActionEvent;
use App\Events\LogEventAction;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::created(function (Category $category) {
            event(new LogEventAction('created', $category));
            event(new CategoryActionEvent($category));
        });

        static::updated(function (Category $category) {
            event(new LogEventAction('updated', $category));
            event(new CategoryActionEvent($category));
        });

        static::deleted(function (Category $category) {
            event(new LogEventAction('deleted', $category));
            event(new CategoryActionEvent($category));
        });
    }

    public static function clearCache()
    {
        Cache::forget('categories');
        Cache::forget('categoriesCount');
    }

    // Eloquent Relationship
    public function posts() 
    {
        return $this->hasMany(Post::class);
    }
}
