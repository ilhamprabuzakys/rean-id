<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Event extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];

    protected $dates = ['start_date', 'end_date'];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];


    public function getRouteKeyName()
    {
        return 'slug';
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
            ->useLogName('Event')
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
                return "Data Event telah {$aksi}";
            });
    }

    public function scopeGlobalSearch($query, $search)
    {
        $search = strtolower($search);

        return $query
            ->whereRaw(
                "
        (LOWER(title) LIKE ? OR LOWER(location) LIKE ? OR LOWER(city) LIKE ? OR LOWER(province) LIKE ?)",
                ["%{$search}%", "%{$search}%", "%{$search}%", "%{$search}%"]
            )
            ->orWhereHas('user', function ($q) use ($search) {
                $q->whereRaw("LOWER(name) LIKE ?", ["%{$search}%"]);
            });
    }

    public function getFormattedTime()
    {
        return $this->created_at->format('F d, Y h:i A');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(FileEvent::class);
    }

    protected static function booted()
    {
        static::deleted(function ($event) {
            // $news->file()->delete();
            if ($event->files) {
                try {
                    foreach ($event->files as $fileEvent) {
                        // Hapus file fisik
                        Storage::delete(str_replace('storage/', '', $fileEvent->file_path));
                        // Hapus entri dari database
                        $fileEvent->delete();
                    }
                    // $event->files()->delete();
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
        });
    }
}
