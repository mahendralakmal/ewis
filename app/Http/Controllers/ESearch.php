<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Product;

class ESearch extends Controller
{
    public function productSearch($index)
    {
        $client = ClientBuilder::create()->build();
        $products = Product::all();
        $product = [];
        foreach ($products as $prod) {
            $product[] = [
                'id' => $prod->id,
                'paert_no' => $prod->part_no,
                'name' => $prod->name,
                'description' => $prod->description,
            ];
        }

        $param = [
            "index" => $index,
            "body" => [
                "product" => $product,
            ]
        ];

        //$parrams = json_encode($param);
        return Response::json($param);
//        dd($product);
//        return view('admin.test', compact('parrams'));
    }
}
