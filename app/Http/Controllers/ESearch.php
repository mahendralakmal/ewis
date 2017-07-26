<?php

namespace App\Http\Controllers;

use App\CCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laravel\Scout\Searchable;

class ESearch extends Controller
{
    use Searchable;

    public function searchCProducts(CCategory $c_category, $index)
    {
        $products = Product::search($index)->get();
        $produce = '<div class="form-group">';
        foreach ($products as $key=>$value){
            foreach ($c_category->cproduct as $prod){
                if($value->id == $prod->product_id){
                    $produce = $produce.'<div class="form-group">';
                    $produce = $produce.'<div>'.$value->part_no.'</div><div>'.$value->image.'</div><div>'.$value->name.'</div>';
                    $produce = $produce.'<div>'.$value->vat_apply.'</div>'.'<div>'.$prod->special_price.'</div>';
                    $produce = $produce.'</div>';
                }
            }
        }
        $produce = $produce.'</div>';
//        dd($produce);
        return Response::json($produce);
    }

    public function searchProducts($index)
    {
        $products = Product::search($index)->get();
        return Response::json($products);
    }
}
