<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientuser extends Model
{
    protected $fillable = ['client_id', 'client_id', 'user_id', 'cp_name', 'cp_designation', 'cp_branch', 'cp_telephone', 'cp_email'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
