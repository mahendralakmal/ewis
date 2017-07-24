<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use App\Product;

class ESearch extends Controller
{
    public function productSearch($index)
    {
        $client = ClientBuilder::create()->build();
        $products = Product::all();
        $product = [];
        foreach ($products as $prod){
            $product[] = [
                'index' => $index,
                "body" => [
                    'id'=>$prod->id,
                    'paert_no' => $prod->part_no,
                    'name' => $prod->name,
                    'description' => $prod->description,
                ]
            ];
        }

//        dd($product);
        return view('admin.test', compact('product'));
    }
}
