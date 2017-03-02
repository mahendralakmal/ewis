<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_Product extends Model
{
    protected $fillable=['user_id','product_id','client_id','special_price'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}