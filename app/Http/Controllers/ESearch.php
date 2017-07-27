<?php

namespace App\Http\Controllers;

use App\CCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Laravel\Scout\Searchable;

class ESearch extends Controller
{
    use Searchable;

    public function searchCProducts(CCategory $c_category, $index)
    {
        $products = Product::search($index)->get();
//        dd($products->count());
        $produce = '';
        $top = '';
        $bottom = '';
        $count = 0;

        foreach ($products as $key => $value) {
            foreach ($c_category->cproduct as $prod) {
                if ($value->id == $prod->product_id && $prod->remove != 1) {
                    $count += 1;
                    $produce = $produce . '<form action="/client-profile/add-to-bucket" method="POST" class="side-by-side">';
                    $produce = $produce . '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                    $produce = $produce . '<tr>';
                    $produce = $produce . '<td style="text-align: center"><input type="hidden" name="id" id="id" value="' . $prod->id . '"><input type="hidden" id="id" name="id" value=' . $value->id . '><a href="/client-profile/' . $c_category->c_brand->client->client->id . '/' . $value->part_no . '">' . $value->part_no . '</a></td>';
                    $produce = $produce . '<td align="middle"><img src="' . $value->image . '" alt="product" class="img-responsive" height="25" width="30"></td>';
                    $produce = $produce . '<td style="text-align: left"><a href="/client-profile/' . $c_category->c_brand->client->client->id . '/' . $value->part_no . '">' . $value->name . '</a></td>';

                    if ($value->vat_apply)
                        $produce = $produce . '<td style="text-align: center">Yes</td>';
                    else
                        $produce = $produce . '<td style="text-align: center">No</td>';

                    $produce = $produce . '<td style="text-align: right"><p>' . number_format($prod->special_price, 2, ".", ",") . '</p></td>';
                    $produce = $produce . '<td style="text-align: right">
<input style="width: 50px" align="right" type="number" min="1" value="1" name="Qty'.$count.'" id="Qty'.$count.'" class="form-controls">
</td>';
//                    $produce = $produce . '<td><a class="btn btn-success btn-sm" href="/client-profile/add-to-bucket">Add To Bucket</a></td>';
                    $produce = $produce . '<td><input class="btn btn-success btn-sm" type="submit" value="Add To Bucket"></td>';

                    $produce = $produce . '</tr>';
                    $produce = $produce . '</form>';
                }
            }
        }

        if (strlen($produce) > 0) {
            $top = '<div class="form-group"><table class="table table-bordered"><thead><tr><td> Part Number</td><td> Product Image</td><td> Product Name</td><td> Vat Applicalbe</td><td> Unit Price (Rs.)</td><td class="col-sm-1 col-lg-1 col-md-1">Quantity</td><td></td></tr></thead><tbody>';
            $bottom = '</tbody></table>';
            $bottom = $bottom . '</div>';

            $produce = $top . $produce . $bottom;
        } else {
            if (Session::has('User'))
                $produce = '<div class="jumbotron text-center clearfix"><h2>No items found</h2><p><a href="{{ URL::previous() }}" class="btn btn-primary btn-lg" target="_blank">Category</a><a href="' . '/client-profile/' . User::find(Session::get('User'))->c_user->client_branch->client->id . '/brands' . '" class="btn btn-success btn-lg">Brand</a></p></div>';
        }

        return Response::json($produce);
    }

    public function searchProducts($index)
    {
        $products = Product::search($index)->get();
        return Response::json($products);
    }
}
