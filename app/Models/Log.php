<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this->belongsToMany(User::class, 'logging_users', 'log_id', 'user_id');
    }
}
