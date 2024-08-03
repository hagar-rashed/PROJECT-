<?php

namespace App\Models;
use App\Models\villageImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class village extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'location',
        'lat',
        'lng',
        'services_ar',
        'services_en',
        'owner_name_ar',
        'owner_name_en'
    ];
    public function images(){
        return $this->hasMany(villageImages::class , 'village_id' , 'id');
    }
    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function getDescAttribute()
    {
        return $this->{'desc_' . app()->getLocale()};
    }

}
