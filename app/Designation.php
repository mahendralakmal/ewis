<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{

    protected $fillable=['designation','user_id'];

    public function users(){
        return $this->hasMany(User::class);
    }
}
