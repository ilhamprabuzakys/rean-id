<?php

namespace App\Models;

use App\Events\CategoryActionEvent;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Category extends Model
{
    use HasFactory, Sluggable, LogsActivity;
    protected $guarded = ['id'];

    public function tapActivity(Activity $activity, string $eventName)
    {
        if ($eventName == 'deleted') {
            $activity->properties = $this->attributes;
        }
    }
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Kategori')
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
                return "Data Kategori telah {$aksi}";
            });
    }

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

    public function scopeSearch($query, $search)
    {
        $search = strtolower($search);
        return $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
    }
    
    // Eloquent Relationship
    public function posts() 
    {
        return $this->hasMany(Post::class);
    }

    public function file()
    {
        return $this->hasOne(FileCategory::class);
    }
}
