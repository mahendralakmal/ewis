<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['name','address','telephone','email','logo','color','user_id','approval','status', 'agent_id'];

    public function clientuser(){
        return $this->hasMany(Clientuser::class);
    }


}
