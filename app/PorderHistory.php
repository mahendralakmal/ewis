<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PorderHistory extends Model
{
    protected $fillable = ['po_id','po_datetime','status'];

    public function p_order(){
        return $this->belongsTo(P_Order::class, 'po_id');
    }
}
