<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'user_name',
        'governorate',
        'organization_address',
        'city',
        'add_image',
        'organization_owner',
        'organization_type',
        'password',
        'phone',
        'discount_type',
        'package_value',
        'package_type',
        'discount_value',
        'date',
        'hold',
        'rate',
        'comments',
    ];

    
}
