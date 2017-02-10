<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable=['email','password','name','designation_id','nic_pass'];

    public function designation(){
        return $this->belongsTo(Designation::class);
    }
}
