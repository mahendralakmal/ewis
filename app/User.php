<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable=['email','password','name','designation_id','nic_pass','deleted','approval','user_id'];

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    public function clientuser(){
        return $this->hasMany(Clientuser::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function P_Orders(){
        return $this->hasMany('App\P_Order');
    }
}
