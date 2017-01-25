<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=['title','description','image'];

    public function category(){
        return $this->hasMany(Category::class);
    }
}
