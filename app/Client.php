<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['name','address','telephone','email','logo','color','user_id','approval','status', 'agent_id'];

    public function client_branch(){
        return $this->hasMany(ClientsBranch::class);
    }

//    public function clientuser(){
//        return $this->hasMany(Clientuser::class);
//    }
//
    public function user(){
        return $this->belongsTo(User::class);
    }
//
//    public function cproducts(){
//        return $this->hasMany(CBrand::class);
//    }
//
//    public function ccategories(){
//        return $this->hasMany(CCategory::class);
//    }
//
//    public function client_products(){
//        return $this->hasMany(Client_Product::class);
//    }
//
//    public function P_Orders(){
//        return $this->hasMany('App\P_Order');
//    }
}
