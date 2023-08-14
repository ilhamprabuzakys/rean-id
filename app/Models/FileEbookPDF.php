<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileEbookPDF extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'file_ebook_pdf';
    
    public function ebook()
    {
        return $this->belongsTo(Ebook::class);
    }
    
}
