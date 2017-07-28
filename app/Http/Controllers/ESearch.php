<?php

namespace App\Http\Controllers;

use App\CCategory;
use App\ClientAssignProductView;
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
        $products = ClientAssignProductView::search($index)->get()->where('c_category_id', $c_category->id);
        $produce = '';
        $count = 0;

        foreach ($products as $key => $value) {
            $produce = $produce . '<form action="/client-profile/add-to-bucket" method="POST" class="side-by-side"><input type="hidden" name="_token" value="' . csrf_token() . '">
            <div class="row">
            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><input type="hidden" id="id" name="id" value="' . $value->id . '"><a href="/client-profile/' . $c_category->c_brand->client->client->id . '/' . $value->part_no . '">' . $value->part_no . '</a></div>
            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><img src="' . $value->image . '" alt="product" class="img-responsive" height="25" width="30"></div>
            <div class="col-md-5 " style="border: 1px solid #dddddd; padding:5px; height:45px;"><a href="/client-profile/' . $c_category->c_brand->client->client->id . '/' . $value->part_no . '">' . $value->name . '</a></div>
            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;">';
            if ($value->vat_apply) $produce = $produce . 'Yes'; else $produce = $produce . 'No' . '</div>
            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><p>' . number_format($value->special_price, 2, ".", ",") . '</p></div>
            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><input style="width: 50px" align="right" type="number" min="1" value="1" name="Qty" id="Qty" class="form-controls"></div>
            <div class="col-md-2 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><input class="btn btn-success btn-sm" type="submit" value="Add To Bucket"></div></div></form>';
        }

        if (strlen($produce) > 0) {
            $top = '<div class="row"><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Product Image</div><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Part Number</div><div class="col-md-5 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Product Name</div><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Vat Applicalbe</div><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Unit Price (Rs.)</div><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Quantity</div><div class="col-md-2 td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff"></div></div>';
            $produce = $top . $produce;
        } else {
            if (Session::has('User')) {
                $produce = '<div class="jumbotron text-center clearfix"><h2>No items found</h2><p><a href="{{ URL::previous() }}" class="btn btn-primary btn-lg" target="_blank">Category</a><a href="' . '/client-profile/' . User::find(Session::get('User'))->c_user->client_branch->client->id . '/brands' . '" class="btn btn-success btn-lg">Brand</a></p></div>';
            }
        }

        return Response::json($produce);
    }

    public
    function searchProducts($index)
    {
        $products = Product::search($index)->get();
        return Response::json($products);
    }
}
