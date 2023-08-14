<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeGlobalSearch($query, $search)
    {
        $search = strtolower($search);

        return $query
        ->whereRaw("
        (LOWER(title) LIKE ? OR LOWER(location) LIKE ?)",
        ["%{$search}%", "%{$search}%"])
        ->orWhereHas('user', function($q) use ($search){
           $q->whereRaw("LOWER(name) LIKE ?", ["%{$search}%"]);
         });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function files()
    {
        return $this->hasMany(FileEvent::class);
    }

    protected static function booted() {
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
