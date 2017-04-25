<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsBranch extends Model
{
    protected $fillable=['name','address', 'contact_no','email','client_id'];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function client_user(){
        return $this->hasMany(Clientuser::class);
    }
}
