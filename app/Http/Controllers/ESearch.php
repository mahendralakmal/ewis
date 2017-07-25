<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class ESearch extends Controller
{
    use Searchable;

    public function searchableAs()
    {
        return 'post_index';
    }
}
