<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class FileNews extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Cover Berita')
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
                return "Data Cover Berita telah {$aksi}";
            });
    }
    
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
