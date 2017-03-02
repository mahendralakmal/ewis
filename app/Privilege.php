<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $fillable = ['user_id', 'brand', 'category', 'product', 'add_user', 'user_approve', 'designation',
        'client_prof', 'client_users', 'view_po', 'change_po_status', 'created_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
