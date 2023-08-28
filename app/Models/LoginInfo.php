<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'login_info';

    public function scopeGlobalSearch($query, $search)
    {
        $search = strtolower($search);

        return $query
        ->whereRaw("(LOWER(browser) LIKE ? OR LOWER(os) LIKE ? OR LOWER(device) LIKE ? OR LOWER(login_at)  LIKE ? OR LOWER(country) LIKE ? OR LOWER(region) LIKE ? OR LOWER(city) LIKE ?)",
        ["%{$search}%", "%{$search}%", "%{$search}%", "%{$search}%", "%{$search}%", "%{$search}%", "%{$search}%"])
        ->orWhereHas('user', function($q) use ($search){
           $q->whereRaw("LOWER(name) LIKE ?", ["%{$search}%"]);
         });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
