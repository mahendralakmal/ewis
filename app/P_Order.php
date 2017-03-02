<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class P_Order extends Model
{
    public function User() {
        return $this->belongsTo('App\User');
    }

    public function Client() {
        return $this->belongsTo('App\Client');
    }
}
