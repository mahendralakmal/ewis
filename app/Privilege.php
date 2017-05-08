<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $fillable = ['user_id', 'brand', 'category', 'product', 'add_user', 'user_approve', 'designation',
        'client_prof', 'client_users', 'client_branch', 'view_po', 'change_po_status', 'privilege', 'privilege', 'asign_brand', 'asign_category',
        'asign_product', 'created_user_id', 'assign_agent', 'product_cost', 'view_reports'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
