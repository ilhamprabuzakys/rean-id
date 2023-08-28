<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class FileCategory extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Cover Kategori')
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
                return "Data Cover Kategori telah {$aksi}";
            });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
