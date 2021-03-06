<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['id', 'title', 'description', 'image', 'user_id', 'status'];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function c_brand()
    {
        return $this->hasMany(CBrand::class);
    }

    public function c_category()
    {
        return $this->hasMany(CCategory::class);
    }
}
