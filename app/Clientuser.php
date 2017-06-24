<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientuser extends Model
{
    protected $fillable = ['clients_branch_id', 'user_id', 'cp_name', 'cp_designation', 'cp_branch', 'cp_telephone', 'cp_email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client_branch()
    {
        return $this->belongsTo(ClientsBranch::class, 'clients_branch_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

//    public function cbranch()
//    {
//        return $this->belongsTo(ClientsBranch::class);
//    }



}
