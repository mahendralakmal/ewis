<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ClientAssignProductView extends Model
{
    use Searchable;

    protected $table = 'client_assign_product_views';
}
