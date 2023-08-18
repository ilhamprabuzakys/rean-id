<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subject()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGlobalSearch($query, $search)  
    {
        $search = strtolower($search);
        
        return $query
        ->whereRaw("(LOWER(event) LIKE ? OR LOWER(subject_type) LIKE ?)", 
        ["%{$search}%", "%{$search}%"]) 
        ->orWhereHas('subject', function($q) use ($search){
           $q->whereRaw("LOWER(title) LIKE ?", ["%{$search}%"]); 
         })
        ->orWhereHas('user', function($q) use ($search){
           $q->whereRaw("LOWER(name) LIKE ?", ["%{$search}%"]);
         });
    }
}
