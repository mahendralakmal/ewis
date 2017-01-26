<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['part_no','description','category_id','image','default_price'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
