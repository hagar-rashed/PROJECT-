<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\unitImages;
class unit extends Model
{
    use HasFactory;
    protected $fillable=['location','lat','lng','name','price','owner_name','desc','booked','avilable_from','avilable_to','village_id'];
    public function images(){
        return $this->hasMany(unitImages::class , 'unit_id' , 'id');
    }
}
