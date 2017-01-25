<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['title','brand_id','description','image'];

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
