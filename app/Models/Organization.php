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
        'government',
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

    protected $casts = [
        'date' => 'date', // Ensure date is cast to a Carbon instance
    ];
}
