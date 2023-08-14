<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeGlobalSearch($query, $search)  
    {
        $search = strtolower($search);
        return $query
        ->whereRaw("(LOWER(title) LIKE ? OR LOWER(about) LIKE ?)", 
        ["%{$search}%", "%{$search}%"]) 
        ->orWhereHas('user', function($q) use ($search){
           $q->whereRaw("LOWER(name) LIKE ?", ["%{$search}%"]);
         });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function file()
    {
        return $this->hasOne(FileNews::class);
    }

    protected static function booted() {
        static::deleted(function ($news) {
            // $news->file()->delete();
            if ($news->file && $news->file->file_path !== null)
            {
                try {
                    Storage::disk('public')->delete(str_replace('storage/', '', $news->file->file_path));
                    $news->file()->delete();
                } catch (\Throwable $th) {
                    dd($th);
                }
            } else {
                $news->file()->delete();
            }
            
        });
    }
}
