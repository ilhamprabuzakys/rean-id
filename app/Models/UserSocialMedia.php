<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialMedia extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = ['user_social_media'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
