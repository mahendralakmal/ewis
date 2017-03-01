<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;
use App\Bucket;
use App\Product;
use App\P_Order;
use App\User;
use Illuminate\Support\Collection;

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
            return view('user/bucket');
        }
            $oldBucket = Session::get('bucket');
            $bucket = new Bucket($oldBucket);
            return view('user/bucket', ['products' => $bucket->items, 'totalQty' => $bucket->totalQty, 'totalPrice' => $bucket->totalPrice] );

    }

    public function Checkout() {
        if (!Session::has('bucket')) {
            return view('user/bucket');
        }
            $oldBucket = Session::get('bucket');
            $bucket = new Bucket($oldBucket);
            $total_price = $bucket->totalPrice;
            $total_qty = $bucket->totalQty;
            return view('user/checkout', ['total_price' => $total_price, 'total_qty' => $total_qty ]);
    }

    public function postCheckout(Request $request) {
        if (!Session::has('bucket')) {
            return view('user/bucket');
        }
        $bucket = Session::get('bucket');
        $order = new P_Order();

//        dd(User::find(\Illuminate\Support\Facades\Session::get('User'))->client->id);

        $order->client_id = User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id;
        $order->bucket = serialize($bucket);
        $order->del_branch = $request->input('del_branch');
        $order->del_cp = $request->input('del_cp');
        $order->del_tp = $request->input('del_tp');
        $order->cp_notes = $request->input('cp_notes');
        $order->del_notes = $request->input('del_notes');

        $order->save();

        Session::forget('bucket');
        return redirect('/');
    }

    public function getHistory(){
        $orders = P_Order::find(User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id)->all();
        $orders->transform(function ($order, $key){
           $order->bucket = unserialize($order->bucket);
           return $order;
        });


        return view('user/history', ['orders' => $orders]);
    }

}
