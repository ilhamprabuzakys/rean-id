<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileNews extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function news()
    {
        return $this->belongsTo(News::class);
    }

/*     protected static function booted() {
        static::deleting(function ($fileNews) {
            Storage::disk('public')->delete(str_replace('storage/', '', $fileNews->file_path));
        });
    } */

}
