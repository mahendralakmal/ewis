<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class Client_Assign_Product extends Model
{
    protected $fillable=['ajent_id','product_id','client_id','special_price'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
