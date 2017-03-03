<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCategory extends Model
{
    protected $fillable = ['user_id', 'category_id', 'brand_id', 'client_id', 'remove'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
