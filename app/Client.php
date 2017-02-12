<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['user_id','name','address','telephone','email','logo','color','cp_name','cp_designation','cp_branch','cp_telephone','cp_email'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
