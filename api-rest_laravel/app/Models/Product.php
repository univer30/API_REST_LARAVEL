<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'descrition', 'price'];


    public function getPrinceAttribute()
    {
       return $this->attributes['price'] / 100;  //150 -> 19,30
    }

    public function setPriceAttribute($attr)
    {
      return $this->attributes['price'] = $attr * 100; //19,90 -> 1990
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
