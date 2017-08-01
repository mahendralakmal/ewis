<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class User extends Model
{
    use Searchable;
    protected $fillable=['email','password','name','designation_id','nic_pass','deleted','approval','user_id','section_head_id'];

//    public function toSearchableArray()
//    {
//        return $this->toArray();
//    }

    public function privilege(){
        return $this->hasOne(Privilege::class);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    public function c_user(){
        return $this->hasOne(Clientuser::class);
    }

    public function P_Orders(){
        return $this->hasMany('App\P_Order');
    }

    public function clients(){
        return $this->hasMany(Client::class);
    }

    public function client_branch(){
        return $this->hasMany(ClientsBranch::class);
    }

    public function sector_head(){
        return $this->belongsTo(User::class, 'section_head_id');
    }

}
