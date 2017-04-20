<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCategory extends Model
{
    protected $fillable = ['user_id', 'category_id', 'c_brand_id', 'client_id', 'remove'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function cproduct(){
        return $this->hasMany(Client_Product::class);
    }
}
