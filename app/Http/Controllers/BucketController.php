<?php

namespace App\Http\Controllers;

use App\Client;
use App\Client_Product;
use App\Mail\PoCompleted;
use App\Mail\PoOnProcess;
use App\Mail\PoPartialComplete;
use App\Mail\PoSentSuccessfully;
use App\Mail\PoToAdministration;
use App\Mail\PoToSectionHeads;
use App\Mail\PoToProcument;
use App\Notifications\PerchaseOrder;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Bucket;
use App\Product;
use App\P_Order;
use App\User;
use Illuminate\Support\Collection;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;

class BucketController extends Controller
{
    public  function getPurchaseOrdersByClient(Request $request){
//        return $request->all();
        $clients = Client::all();
        $po = Client::find($request->client);
        $status = $request->postatus;
        $start = $request->start;
        $end = $request->end;

        return view('admin.reports.completed-purchase-orders', compact('clients','po','status','start','end'));
    }

    public function getPriceList()
    {
        $client = Client::all();
        return view('admin/reports/client-wise-price-list', compact('client'));
    }

    public function getPriceListByClient(Client $client, $start, $end){
        if($start != 'n' && $end != 'n') {
            return Client_Product::whereBetween('client__products.created_at',array(new DateTime($start),new DateTime($end)))->get();
        }else {
            return $client->client_products;
        }
    }

    public function change_status($id, $status){
        $po = P_Order::find($id);
        $po->update(['status'=>$status]);
        $user = User::where('name', $po->del_cp)->first();

        $agent = User::find($po->agent_id)->first();
        if($status==="OP"){
            Mail::to($user)->send(new PoOnProcess($user, $po));
            //Mail::to($agent)->send(new PoOnProcess($user, $po));
        }
        elseif ($status==="PC") {
            Mail::to($user)->send(new PoPartialComplete($user, $po));
            //Mail::to($agent)->send(new PoPartialComplete($user, $po));
        }
        elseif ($status==="C") {
            Mail::to($user)->send(new PoCompleted($user, $po));
            //Mail::to($agent)->send(new PoCompleted($user, $po));
        }
        return back();
    }

    public function getAddToBucket(Request $request)
    {
//        $product = Product::where('part_no', $request->part_no)->first();
        $product = Client_Product::find($request->id);
//        $product = $client_product->product;
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $bucket->add($product, $product->product->part_no, $product->special_price, $request->Qty);
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
        $client_product = Client_Product::all();
        $branch = Session::has('User') ? User::find(Session::get('User'))->c_user->client_branch : null;

        return view('user/bucket', ['products' => $bucket->items, 'totalQty' => $bucket->totalQty, 'totalPrice' => $bucket->totalPrice, 'client_product' => $client_product, 'branch' => $branch ]);

    }

    public function remove_item($part_no)
    {
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $bucket->remove($part_no);
        Session::put('bucket', $bucket);


//        $request->item->remove($id);
//        Session::put('bucket',$bucket);

        return back();
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
        $file = $request->hasFile('file') ? 'storage/' . Storage::disk('local')->put('/checkout', $request->file('file')) : null;
        $user = User::find(\Illuminate\Support\Facades\Session::get('User'));
//        $order->client_id = $user->c_user->client_branch->client->id;
        $order->clients_branch_id = $user->c_user->client_branch->id;
        $order->bucket = serialize($bucket);
        $order->del_branch = $request->input('del_branch');
        $order->del_cp = $request->input('del_cp');
        $order->del_tp = $request->input('del_tp');
        $order->file = $file;
//        $order->cp_notes = $request->input('cp_notes');
        $order->del_notes = $request->input('del_notes');
        $order->status = "P";
        $order->agent_id =  $user->c_user->client_branch->agent_id;


        $order->save();

        $agent = User::find($order->agent_id);
        $sHead = User::find($agent->section_head_id);
        $order->bucket = unserialize($order->bucket);

        //send the notification to client
        Mail::to($user)->send(new PoSentSuccessfully($user, $order));
        Mail::to($agent)->send(new PoToAdministration($user, $order));
        Mail::to($sHead)->send(new PoToSectionHeads($user, $order, $agent));
        Mail::to('bimalka@ewisl.net')->send(new PoToProcument($user, $order, $agent));


        Session::forget('bucket');
        return redirect('/');
    }

    public function getHistory()
    {
        $orders = P_Order::find(User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id)->all();
        $orders->transform(function ($order, $key) {
            $order->bucket = unserialize($order->bucket);
            return $order;
        });
        return view('user/history', ['orders' => $orders]);
    }

    public function getPurchaseOrder()
    {
        $porder = P_Order::all();
        return view('admin/clients/purchase-orders-view', compact('porder'));
    }

    public function pendingPurchaseOrder()
    {
        $porder = P_Order::where('status', 'P' )->get();
        return view('admin/clients/purchase-orders-pending', compact('porder'));
    }

    public function pcPurchaseOrder()
    {
        $porder = P_Order::where('status', 'PC' )->get();
        return view('admin/clients/purchase-orders-partial-completed', compact('porder'));
    }

    public function ajaxPurchaseOrderStatus($from,$to,$status)
    {
        if($from!='' && $to!='' && $status != '' && $status != 'a')
            $porder = P_Order::whereBetween('p__orders.created_at',[$from,$to])
                ->where('p__orders.status',$status)
                ->join('clients_branches','p__orders.clients_branch_id','clients_branches.id')
                ->join('clients','clients_branches.client_id','clients.id')
                ->select('p__orders.id','p__orders.created_at','p__orders.del_branch','p__orders.updated_at','clients.name','p__orders.status')->get();
        else if($from!='' && $to!='' && $status == 'a')
            $porder = P_Order::whereBetween('p__orders.created_at',[$from,$to])
                ->join('clients_branches','p__orders.clients_branch_id','clients_branches.id')
                ->join('clients','clients_branches.client_id','clients.id')
                ->select('p__orders.id','p__orders.created_at','p__orders.del_branch','p__orders.updated_at','clients.name','p__orders.status')->get();
        else
            $porder = P_Order::where('status', 'P' )->get();

        return Response::json($porder);
    }

    public function CompletedPurchaseOrders()
    {
        $porder = P_Order::where('status', 'C' )->get();
        return view('admin/clients/purchase-orders-completed', compact('porder'));
    }

    public function CompletedPurchaseOrder()
    {
        $clients = Client::all();
        $po = "";
        $status = "";
        $start = "";
        $end = "";
        return view('admin/reports/completed-purchase-orders', compact('clients','po','status','start','end'));
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

    public function historyPODetails($id)
    {
        $order = P_Order::find($id);
        $order->bucket = unserialize($order->bucket);
        $branch = Session::has('User') ? User::find(Session::get('User'))->c_user->client_branch : null;

        return view('user/detail-orders', compact('order','branch'));
    }

}
