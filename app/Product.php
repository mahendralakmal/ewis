<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    protected $fillable=['part_no', 'name' ,'description','category_id','image','default_price','user_id','status','vat','vat_apply'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'part_no' => $this->part_no
        ];
    }

//    public function toSearchableArray()
//    {
//        return [
//            'part_no' => $this->part_no
//        ];
//    }
}
