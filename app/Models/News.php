<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeGlobalSearch($query, $search)  
    {
        $search = strtolower($search);
        return $query
        ->whereRaw("
        (LOWER(title) LIKE ? OR LOWER(about) LIKE ?)", 
        ["%{$search}%", "%{$search}%"]) 
        ->orWhereHas('user', function($q) use ($search){
           $q->whereRaw("LOWER(name) LIKE ?", ["%{$search}%"]);
         });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
