<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'experience_id',
        'user_id',
    ];
}
