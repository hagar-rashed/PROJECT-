<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'order_num',
        'price_after_discount',
        'discount',
        'client_name',
        'package',
        'serial_num',
       
    ];

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function getDescAttribute()
    {
        return $this->{'desc_' . app()->getLocale()};
    }
}
