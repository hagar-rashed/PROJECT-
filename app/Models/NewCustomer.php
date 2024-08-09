<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCustomer extends Model
{
    use HasFactory;
    protected $table = 'new_customers'; 
    protected $fillable = [
        'name',
        'address',
        'governorate',
        'national_id',
        'password',
        'user_name',
        'delivery_name',
        'amount_paid',
        'city',
        'registration_date',
        'registration_start',
        'registration_end',
        'request_status',
        'registration_duration',
        'coupon_number',
        'hold',
    ];



    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
