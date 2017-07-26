<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laravel\Scout\Searchable;

class ESearch extends Controller
{
    use Searchable;

    public function searchProducts($index)
    {
//        dd($index);
        $products = Product::search($index)->get();
        return Response::json($products);
    }
}
