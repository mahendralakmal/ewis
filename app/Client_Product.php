<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_Product extends Model
{
    protected $fillable=['user_id','product_id','brand_id','c_category_id','clients_branch_id','special_price', 'remove'];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function ccategory(){
        return $this->belongsTo(CCategory::class);
    }

    public function cbrand(){
        return $this->belongsTo(CBrand::class);
    }
}
