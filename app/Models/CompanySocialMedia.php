<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySocialMedia extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'company_social_media';

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
