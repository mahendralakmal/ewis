<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsBranch extends Model
{
    protected $fillable=['name','address', 'contact_no','email','client_id','agent_id','activation'];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function client_user(){
        return $this->hasMany(Clientuser::class);
    }

    public function cbrands(){
        return $this->hasMany(CBrand::class);
    }

    public function ccategory(){
        return $this->hasMany(CCategory::class);
    }

    public function cproduct(){
        return $this->hasMany(Client_Product::class);
    }

    public function p_orders(){
        return $this->hasMany(P_Order::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class,'agent_id');
    }
}
