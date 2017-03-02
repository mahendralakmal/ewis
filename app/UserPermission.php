<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $fillable = ['user_id', 'brand', 'category', 'product', 'add-user', 'user-approve', 'designation', 'client-prof', 'client-users', 'view-po', 'change-po-status', 'created_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
