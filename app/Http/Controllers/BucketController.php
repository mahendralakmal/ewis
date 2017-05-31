<?php

namespace App\Http\Controllers;

use App\Client;
use App\Client_Product;
use App\ClientsBranch;
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
    public function getAllPurchaseOrders(Request $request)
    {
//        return $request->all();
        $agents = User::where('designation_id', 4);

        $status = $request->postatus;
        $start = $request->from;
        $end = $request->to;
        if ($start != "" && $end != ""){
            $p_orders = P_Order::whereBetween('p__orders.created_at', [$start, $end])->get();
        $p_orders->transform(function ($p_orders, $key) {
            $p_orders->bucket = unserialize($p_orders->bucket);
            return $p_orders;
        });}

        else {
            $p_orders = P_Order::all();
            $p_orders->transform(function ($p_orders, $key) {
            $p_orders->bucket = unserialize($p_orders->bucket);
            return $p_orders;
        });}

            return view('admin.reports.all-purchase-orders', compact('clients', 'p_orders' , 'status', 'agents', 'start', 'end'));
    }

    public function getPurchaseOrdersByAccountManager(Request $request)
    {
        $this->validate(request(),
            [
                'agent' => 'required',
                'postatus' => 'required',
            ],
            [
                'agent.required' => 'Please select an Account Manager.',
                'postatus.required' => "Please select Status."
            ]
        );
//        return $request->all();
        $agents = User::all();
        $po = User::find($request->agent);
        $branch = ClientsBranch::where('agent_id', $po->id)->get();
        $status = $request->postatus;
        $start = $request->from;
        $end = $request->to;
        if ($start != "" && $end != "" && $status !=""){
            $p_orders = P_Order::whereBetween('p__orders.created_at', [$start, $end])->get();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });}

        else {
            $p_orders = P_Order::all();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });}

        return view('admin.reports.agent-wise-purchase-orders',
            compact('po', 'status', 'branch','agents','start','end','p_orders'));
    }

    public function getPurchaseOrdersByClient(Request $request)
    {
        $clients = Client::all();
        $po = Client::find($request->client);
        $status = $request->postatus;
        $start = $request->start;
        $end = $request->end;

        return view('admin.reports.completed-purchase-orders', compact('clients', 'po', 'status', 'start', 'end'));
    }

    public function getPriceList()
    {
        $client = Client::all();
        return view('admin/reports/client-wise-price-list', compact('client'));
    }

    public function getPriceListByClient(Client $client, $start, $end)
    {
        if ($start != 'n' && $end != 'n') {
            return Client_Product::whereBetween('client__products.created_at', array(new DateTime($start), new DateTime($end)))->get();
        } else {
            return $client->client_products;
        }
    }

    public function change_status($id, $status)
    {
        $po = P_Order::find($id);

        $po->update(['status' => $status]);

        $users = $po->client_branch->client_user;

        $agent = $po->cam;

        if ($status === "OP") {
            foreach ($users as $usr) {
                $user = User::find($usr->user_id);
                Mail::to($user)->send(new PoOnProcess($user, $po));
                Mail::to($agent)->send(new PoOnProcess($user, $po));
            }
        } elseif ($status === "PC") {
            foreach ($users as $usr) {
                $user = User::find($usr->user_id);
                Mail::to($user)->send(new PoPartialComplete($user, $po));
                Mail::to($agent)->send(new PoPartialComplete($user, $po));
            }
        } elseif ($status === "C") {
            foreach ($users as $usr) {
                $user = User::find($usr->user_id);
                Mail::to($user)->send(new PoCompleted($user, $po));
                Mail::to($agent)->send(new PoCompleted($user, $po));
            }
        }
        return back();
    }

    public function getAddToBucket(Request $request)
    {
        $product = Client_Product::find($request->id);
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $bucket->add($product, $product->product->part_no, $product->special_price, $request->Qty);
        $request->session()->put('bucket', $bucket);
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

        return view('user/bucket', ['products' => $bucket->items, 'totalQty' => $bucket->totalQty, 'totalPrice' => $bucket->totalPrice, 'client_product' => $client_product, 'branch' => $branch]);

    }

    public function remove_item($part_no)
    {
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $bucket->remove($part_no);
        Session::put('bucket', $bucket);

        return back();
    }

    public
    function Checkout()
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

    public
    function postCheckout(Request $request)
    {
        if (!Session::has('bucket')) {
            return view('user/bucket');
        }
        $bucket = Session::get('bucket');
        $order = new P_Order();
        $file = $request->hasFile('file') ? 'storage/' . Storage::disk('local')->put('/checkout', $request->file('file')) : null;
        $user = User::find(Session::get('User'));
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
        $order->agent_id = $user->c_user->client_branch->agent_id;


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

    public
    function getHistory()
    {
        $orders = P_Order::find(User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id)->all();
        $orders->transform(function ($order, $key) {
            $order->bucket = unserialize($order->bucket);
            return $order;
        });
        return view('user/history', ['orders' => $orders]);
    }

    public
    function getPurchaseOrder()
    {
        if (Session::get('User') == 1)
            $porders = P_Order::all();
        else
            $porders = User::find(Session::get('User'));

        return view('admin/clients/purchase-orders-view', compact('porders'));
    }

    public function pendingPurchaseOrder()
    {
        if(Session::has('User')) {
            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::where('status', 'P')->get();
            else
                $porders = User::find(Session::get('User'));
        }
        return view('admin/clients/purchase-orders-pending', compact('porders'));
    }


    public function processingPurchaseOrder()
    {
        if(Session::has('User')) {
            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::where('status', 'OP')->get();
            else
                $porders = User::find(Session::get('User'));
        }
        return view('admin/clients/purchase-orders-processing', compact('porders'));
    }

    public function getProcessingPoCount()
    {
        if(Session::has('User')){
            $user = User::find(Session::get('User'));
            if ($user->id == 1 || $user->designation_id == 5 || $user->designation_id == 7) {
                $porder = P_Order::where('status', 'OP')->count();
            } else {
                $porder = 0;
                if ($user->designation_id == 6) {
                    foreach (User::where('section_head_id', $user->id)->get() as $cbranch) {
                        foreach (ClientsBranch::where('agent_id', $cbranch->id)->get() as $tbranch) {
                            $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'OP']])->count();
                        }
                    }
                    foreach (User::where('section_head_id', $cbranch->id)->get() as $sbranch) {
                        foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                            $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'OP']])->count();
                        }
                    }
                    foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                        $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'OP']])->count();
                    }
                } else {
                    foreach (User::where('section_head_id', $user->id)->get() as $sbranch) {
                        foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                            $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'OP']])->count();
                        }
                    }
                    if (ClientsBranch::where('agent_id', $user->id)->count() > 0) {
                        foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                            if (P_Order::where('clients_branch_id', $cbranch->id)->count() > 0) {
                                $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'OP']])->count();
                            }
                        }
                    }
                }
            }
            return Response::json($porder);
        }
    }

    public
    function getPendingPoCount()
    {
        $user = User::find(Session::get('User'));
        if ($user->id == 1 || $user->designation_id == 5 || $user->designation_id == 7) {
            $porder = P_Order::where('status', 'P')->count();
        } else {
            $porder = 0;
            if ($user->designation_id == 6) {
                foreach (User::where('section_head_id', $user->id)->get() as $cbranch) {
                    foreach (ClientsBranch::where('agent_id', $cbranch->id)->get() as $tbranch) {
                        $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'P']])->count();
                    }
                }
                foreach (User::where('section_head_id', $cbranch->id)->get() as $sbranch) {
                    foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                        $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'P']])->count();
                    }
                }
                foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                    $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'P']])->count();
                }
            } else {
                foreach (User::where('section_head_id', $user->id)->get() as $sbranch) {
                    foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                        $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'P']])->count();
                    }
                }
                if (ClientsBranch::where('agent_id', $user->id)->count() > 0) {
                    foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                        if (P_Order::where('clients_branch_id', $cbranch->id)->count() > 0) {
                            $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'P']])->count();
                        }
                    }
                }
            }
        }
        return Response::json($porder);
    }

    public
    function getPCompletePoCount()
    {
        $user = User::find(Session::get('User'));
        if ($user->id == 1 || $user->designation_id == 5 || $user->designation_id == 7) {
            $porder = P_Order::where('status', 'PC')->count();
        } else {
            $porder = 0;
            if ($user->designation_id == 6) {
                foreach (User::where('section_head_id', $user->id)->get() as $cbranch) {
                    foreach (ClientsBranch::where('agent_id', $cbranch->id)->get() as $tbranch) {
                        $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'PC']])->count();
                    }
                }
                foreach (User::where('section_head_id', $cbranch->id)->get() as $sbranch) {
                    foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                        $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'PC']])->count();
                    }
                }
                foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                    $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'PC']])->count();
                }
            } else {
                foreach (User::where('section_head_id', $user->id)->get() as $sbranch) {
                    foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                        $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'PC']])->count();
                    }
                }
                if (ClientsBranch::where('agent_id', $user->id)->count() > 0) {
                    foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                        if (P_Order::where('clients_branch_id', $cbranch->id)->count() > 0) {
                            $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'PC']])->count();
                        }
                    }
                }
            }
        }
        return Response::json($porder);
    }

    public
    function pcPurchaseOrder()
    {
        if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
            $porders = P_Order::where('status', 'PC')->get();
        else
            $porders = User::find(Session::get('User'));
        return view('admin/clients/purchase-orders-partial-completed', compact('porders'));
    }

    public
    function ajaxPurchaseOrderStatus($from, $to, $status)
    {
        if ($from != '' && $to != '' && $status != '' && $status != 'a')
            $porder = P_Order::whereBetween('p__orders.created_at', [$from, $to])
                ->where('p__orders.status', $status)
                ->join('clients_branches', 'p__orders.clients_branch_id', 'clients_branches.id')
                ->join('clients', 'clients_branches.client_id', 'clients.id')
                ->select('p__orders.id', 'p__orders.created_at', 'p__orders.del_branch', 'p__orders.updated_at', 'clients.name', 'p__orders.status')->get();
        else if ($from != '' && $to != '' && $status == 'a')
            $porder = P_Order::whereBetween('p__orders.created_at', [$from, $to])
                ->join('clients_branches', 'p__orders.clients_branch_id', 'clients_branches.id')
                ->join('clients', 'clients_branches.client_id', 'clients.id')
                ->select('p__orders.id', 'p__orders.created_at', 'p__orders.del_branch', 'p__orders.updated_at', 'clients.name', 'p__orders.status')->get();
        else
            $porder = P_Order::where('status', 'P')->get();

        return Response::json($porder);
    }

    public
    function CompletedPurchaseOrders()
    {
        if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
            $porders = P_Order::where('status', 'C')->get();
        else
            $porders = User::find(Session::get('User'));

        return view('admin/clients/purchase-orders-completed', compact('porders'));
    }

    public
    function CompletedPurchaseOrder()
    {
        $clients = Client::all();
        $po = "";
        $status = "";
        $start = "";
        $end = "";
        return view('admin/reports/completed-purchase-orders', compact('clients', 'po', 'status', 'start', 'end'));
    }

    public function AgentPurchaseOrder()
    {
        $clients = Client::all();
        $branch = ClientsBranch::all();
//        $agents = User::where('designation_id', '4')->get();
        $agents = User::all();

        $po = "";
        $status = "";
        $start = "";
        $end = "";
        return view('admin.reports.agent-wise-purchase-orders', compact('clients', 'po', 'status', 'start', 'end', 'agents', 'branch'));
    }

    public function AllPurchaseOrder()
    {
        $clients = Client::all();
        $branch = ClientsBranch::all();
        $agents = User::where('designation_id', '4')->get();

        $p_orders = P_Order::all();
        $status = "";
        $start = "";
        $end = "";
        return view('admin.reports.all-purchase-orders', compact('clients', 'p_orders', 'status', 'start', 'end', 'agents', 'branch'));
    }

    public
    function getPurchaseOrdersByStatus($status)
    {
        $order = P_Order::where('status', $status);
        return $order;
    }

    public
    function getPODetails($id)
    {
        $order = P_Order::find($id);
        $order->bucket = unserialize($order->bucket);
        $branch = ClientsBranch::find($order->clients_branch_id);
        return view('admin/clients/detail-orders', compact('order', 'branch'));
    }

    public
    function historyPODetails($id)
    {
        $order = P_Order::find($id);
        $order->bucket = unserialize($order->bucket);
        $branch = Session::has('User') ? User::find(Session::get('User'))->c_user->client_branch : null;

        return view('user/detail-orders', compact('order', 'branch'));
    }

}
