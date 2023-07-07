<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'login_info';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
