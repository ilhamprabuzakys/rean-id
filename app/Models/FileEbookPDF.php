<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class FileEbookPDF extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];
    protected $table = 'file_ebook_pdf';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('PDF Ebook')
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
                return "Data PDF Ebook telah {$aksi}";
            });
    }
    
    public function ebook()
    {
        return $this->belongsTo(Ebook::class);
    }
    
}
