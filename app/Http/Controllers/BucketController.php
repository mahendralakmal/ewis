<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;
use App\Bucket;
use App\Product;
use App\P_Order;
use App\User;

class BucketController extends Controller
{
    public function getAddToBucket(Request $request)
    {
        $product = Product::where('part_no',$request->part_no)->first();
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $bucket->add($product, $product->part_no, $request->Qty);
        $request->session()->put('bucket', $bucket);
        return back();
    }

    public function getBucket() {
        if (!Session::has('bucket')) {
            return view('bucket');
        }
            $oldBucket = Session::get('bucket');
            $bucket = new Bucket($oldBucket);
            return view('bucket', ['products' => $bucket->items, 'totalQty' => $bucket->totalQty, 'totalPrice' => $bucket->totalPrice] );

    }

    public function Checkout() {
        if (!Session::has('bucket')) {
            return view('bucket');
        }
            $oldBucket = Session::get('bucket');
            $bucket = new Bucket($oldBucket);
            $total_price = $bucket->totalPrice;
            $total_qty = $bucket->totalQty;
            return view('checkout', ['total_price' => $total_price, 'total_qty' => $total_qty ]);
    }

    public function postCheckout(Request $request) {
        if (!Session::has('bucket')) {
            return view('bucket');
        }
        $bucket = Session::get('bucket');
        $order = new P_Order();
        $order->client_id = User::find(\Illuminate\Support\Facades\Session::get('User'))->client->id;
        $order->bucket = serialize($bucket);
        $order->del_branch = $request->input('del_branch');
        $order->del_cp = $request->input('del_cp');
        $order->del_tp = $request->input('del_tp');

        $order->save();

        Session::forget('bucket');
        return view('user/brands');


//        $items = $bucket->items;
//        dd($items);



    }

}
