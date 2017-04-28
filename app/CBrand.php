<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CBrand extends Model
{
    protected $fillable = ['user_id', 'brand_id', 'clients_branch_id', 'remove'];

    public function client()
    {
        return $this->belongsTo(ClientsBranch::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public  function c_category(){
        return $this->hasMany(CCategory::class);
    }
}
