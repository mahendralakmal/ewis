<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientuser extends Model
{
    protected $fillable=['designation','user_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
