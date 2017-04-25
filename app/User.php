<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable=['email','password','name','designation_id','nic_pass','deleted','approval','user_id','section_head_id'];

    public function privilege(){
        return $this->hasOne(Privilege::class);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

//    public function clientuser(){
//        return $this->hasMany(Clientuser::class);
//    }

//    public function client(){
//        return $this->hasMany(Client::class);
//    }

    public function P_Orders(){
        return $this->hasMany('App\P_Order');
    }

    public function client_branch(){
        return $this->belongsTo(ClientsBranch::class);
    }
}
