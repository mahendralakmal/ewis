<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CBrand extends Model
{
    protected $fillable = ['user_id', 'brand_id', 'client_id', 'remove'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
