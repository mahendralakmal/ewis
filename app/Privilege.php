<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $fillable = [
        'user_id',
        'brand', 'category', 'product', 'product_cost',
        'add_user', 'user_approve', 'designation', 'privilege',
        'client_prof', 'client_users', 'client_branch', 'assign_agent','asign_brand','asign_category','asign_product','manage_client',
        'view_po', 'change_po_status',  'view_reports',
        'created_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
