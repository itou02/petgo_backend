<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'variety',
        'size',
        'sex',
        'age',
        'start_date',
        'end_date',
        'intro',
        'img',
        'remind',
        'ligation',
        'hospital',
        'hospital_address',
        'contact_person',
        'contact_phone',
        'user_id',
    ];
}
