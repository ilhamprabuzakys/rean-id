<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'companies';


    public function social_media()
    {
        return $this->hasOne(CompanySocialMedia::class, '');
    }
}
