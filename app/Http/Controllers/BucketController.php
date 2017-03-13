<?php

namespace App\Http\Controllers;

use App\Client;
use App\Mail\PoSentSuccessfully;
use App\Mail\PoToAdministration;
use App\Mail\PoToSectionHeads;
use App\Notifications\PerchaseOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Http\Request;
use App\Bucket;
use App\Product;
use App\P_Order;
use App\User;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class BucketController extends Controller
{

    public function change_status($id, $status){
        $po = P_Order::find($id);
        $po->update(['status'=>$status]);
        return back();
    }

    public function getAddToBucket(Request $request)
    {
        $product = Product::where('part_no', $request->part_no)->first();
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $bucket->add($product, $product->part_no, $request->Qty);
        $request->session()->put('bucket', $bucket);
//        return route('client-profile/SendMail',[]);
        return back();
    }

    public function getBucket()
    {
        if (!Session::has('bucket')) {
            return view('user/bucket');
        }
        $oldBucket = Session::get('bucket');
        $bucket = new Bucket($oldBucket);
        return view('user/bucket', ['products' => $bucket->items, 'totalQty' => $bucket->totalQty, 'totalPrice' => $bucket->totalPrice]);

    }

    public function remove_item(Request $request, $item_id)
    {
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $products = $bucket->items;
        foreach ($products as $product) {
//            echo "id: ".$product['item'] ['id'];
            if ($product['item'] ['id'] == $item_id) {
//                return $item_id;
                $bucket->remove($product);
//                $request->session()->forget($product);
            };
        }
//    return ($product);
    }

    public function Checkout()
    {
        if (!Session::has('bucket')) {
            return view('user/bucket');
        }
        $oldBucket = Session::get('bucket');
        $bucket = new Bucket($oldBucket);
        $total_price = $bucket->totalPrice;
        $total_qty = $bucket->totalQty;
        return view('user/checkout', ['total_price' => $total_price, 'total_qty' => $total_qty]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('bucket')) {
            return view('user/bucket');
        }
        $bucket = Session::get('bucket');
        $order = new P_Order();

        $user = User::find(\Illuminate\Support\Facades\Session::get('User'));
        $order->client_id = $user->clientuser->first()->client->id;
        $order->bucket = serialize($bucket);
        $order->del_branch = $request->input('del_branch');
        $order->del_cp = $request->input('del_cp');
        $order->del_tp = $request->input('del_tp');
        $order->cp_notes = $request->input('cp_notes');
        $order->del_notes = $request->input('del_notes');
        $order->status = "P";
        $order->agent_id =  $user->clientuser->first()->client->agent_id;


        $order->save();

        $agent = User::find($order->agent_id);
        $sHead = User::find($agent->section_head_id);
        $order->bucket = unserialize($order->bucket);

        //send the notification to client
        Mail::to($user)->send(new PoSentSuccessfully($user, $order));
        Mail::to($agent)->send(new PoToAdministration($user, $order));
        Mail::to($sHead)->send(new PoToSectionHeads($user, $order, $agent));


        Session::forget('bucket');
        return redirect('/');
    }

//    public function getHistory()
//    {
//        $orders = P_Order::find(User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id)->all();
//        $orders->transform(function ($order, $key) {
//            $order->bucket = unserialize($order->bucket);
//            return $order;
//        });
//        return view('user/history', ['orders' => $orders]);
//    }

    public function getHistory()
    {
        $orders = P_Order::find(User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id)->all();
//        $orders = new \ArrayObject();
//        for($i = 0; $i<12; $i++) {
//            $orders->append(P_Order::whereMonth(['created_at', $i+1]));
//            $orders->append(P_Order::whereMonth([['client_id', User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id], ['created_at', $i+1]]));

//        dd($orders);
        return view('user/history', compact('orders'));
    }

    public function getPurchaseOrder()
    {
        $porder = P_Order::all();
        return view('admin/clients/view-purchase-orders', compact('porder'));
    }

    public function pendingPurchaseOrder()
    {
        $porder = P_Order::where('status', 'P' )->get();
        return view('admin/clients/pending-purchase-orders', compact('porder'));
    }

    public function pcPurchaseOrder()
    {
        $porder = P_Order::where('status', 'PC' )->get();
        return view('admin/clients/pc-purchase-orders', compact('porder'));
    }

    public function CompletedPurchaseOrder()
    {
        $client = Client::all();
        return view('admin/clients/completed-purchase-orders', compact('client'));
    }

    public function getPurchaseOrdersByClient($client, $status){
        if($status == '') {
            $porder = P_Order::where('client_id', $client)->get();
        } else {
            $porder = P_Order::where([['client_id', $client],['status',$status]])->get();
        }
        return $porder;
    }

    public function getPurchaseOrdersByStatus($status){
        $order = P_Order::where('status',$status);
        return $order;
    }

    public function getPODetails($id)
    {
        $order = P_Order::find($id);
            $order->bucket = unserialize($order->bucket);
        return view('admin/clients/detail-orders', compact('order'));
    }

}
