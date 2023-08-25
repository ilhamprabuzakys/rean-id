<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ebook extends Model
{
    protected $guarded = ['id'];

    public function scopeGlobalSearch($query, $search)
    {
        $search = strtolower($search);

        return $query
        ->whereRaw("(LOWER(title) LIKE ? OR LOWER(author) LIKE ?)",
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
        return $this->hasMany(FileEbook::class);
    }
    
    public function pdf()
    {
        return $this->hasOne(FileEbookPDF::class);
    }

    protected static function booted() {
        static::deleted(function ($ebook) {
            // $news->file()->delete();
            if ($ebook->files) {
                try {
                    foreach ($ebook->files as $file) {
                        // Hapus file fisik
                        Storage::delete(str_replace('storage/', '', $file->file_path));
                        // Hapus entri dari database
                        $file->delete();
                    }
                    // $event->files()->delete();
                } catch (\Throwable $th) {
                    dd($th);
                }
            } 
            
            if ($ebook->pdf && $ebook->pdf->file_path !== null) {
                // dd('ada pdf', $ebook->pdf->file_path);
                try {
                    // Hapus file fisik
                    Storage::delete(str_replace('storage/', '', $ebook->pdf->file_path));
                    // Hapus entri dari database
                    $ebook->pdf()->delete();
                    // $event->files()->delete();
                } catch (\Throwable $th) {
                    dd($th);
                }
            }
        });
    }
}
