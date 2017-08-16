<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class P_Order extends Model
{
    protected $fillable = ['status'];
    public function User() {
        return $this->belongsTo('App\User');
    }

    public function Client() {
        return $this->belongsTo('App\Client');
    }

    public function client_branch()
    {
        return $this->belongsTo(ClientsBranch::class, 'clients_branch_id');
    }

    public function cam()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function p_o_history(){
        return $this->hasMany(PorderHistory::class);
    }
}
