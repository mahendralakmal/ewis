<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientProfile extends Model
{
    protected $fillable=['user_id','cp_name','cp_designation','cp_branch','cp_telephone','cp_email'];
    protected $table= 'client';
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
