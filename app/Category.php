<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['title','brand_id','description','image', 'status', 'user_id','category_key'];

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function c_category(){
        return $this->hasMany(CCategory::class);
    }
}
