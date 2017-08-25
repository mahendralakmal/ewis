<?php

namespace App\Http\Controllers;

use App\Client;
use App\Client_Product;
use App\ClientsBranch;
use App\Mail\PoCancelled;
use App\Mail\PoCompleted;
use App\Mail\PoOnProcess;
use App\Mail\PoCreditHold;
use App\Mail\PoPartialComplete;
use App\Mail\PoSentSuccessfully;
use App\Mail\PoToAdministration;
use App\Mail\PoToSectionHeads;
use App\Mail\PoToProcument;
use App\Notifications\PerchaseOrder;
use App\PorderHistory;
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
    public
    function CancelledPurchaseOrder()
    {
        $from = '';
        $to = '';
        if (Session::has('User')) {
            if (Session::get('User') == 1)
                $porders = P_Order::where('status', 'CN')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::where('status', 'CN')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 6)
                $porders = P_Order::where('status', 'CN')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = P_Order::where('status', 'CN')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));

            return view('admin/clients/purchase-orders-cancelled', compact('porders', 'from', 'to'));
        } else return redirect('/');
    }

    public
    function CancelledPurchases($from, $to)
    {
        if (Session::has('User')) {
            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::whereBetween('created_at', [$from, $to])->where('status', 'CN')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = User::find(Session::get('User'));

            return view('admin/clients/purchase-orders-cancelled', compact('porders', 'from', 'to'));
        } else return redirect('/');
    }

    public function CompletionTime()
    {
        $distinct_pos = PorderHistory::select('po_id')->orderBy('po_id', 'desc')->distinct('po_id')->get();

        $pos = PorderHistory::all();

        return view('admin.reports.completion-time', compact('distinct_pos','pos'));
    }

    public
    function getPurchaseOrdersBySectorHead(Request $request)
    {
//        $this->validate(request(),
//            [
//                'agent' => 'required',
//                'postatus' => 'required',
//            ],
//            [
//                'agent.required' => 'Please select an Account Manager.',
//                'postatus.required' => "Please select Status."
//            ]
//        );
//        return $request->all();
        $sheads = User::all();
        $po = User::find($request->shead);
        $branch = ClientsBranch::where('agent_id', $po->id)->get();
        $status = $request->postatus;
        $start = $request->from;
        $end = $request->to;
        if ($start != "" && $end != "" && $status != "") {
            $p_orders = P_Order::whereBetween('p__orders.created_at', [$start, $end])->get();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });
        } else {
            $p_orders = P_Order::all();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });
        }

        return view('admin.reports.sectorhead-wise-purchase-orders',
            compact('po', 'status', 'branch', 'sheads', 'start', 'end', 'p_orders'));
    }

    public
    function getAllPurchaseOrders(Request $request)
    {
//        return $request->all();
        $agents = User::where('designation_id', 4);

        $status = $request->postatus;
        $start = $request->from;
        $end = $request->to;
        if ($start != "" && $end != "") {
            $p_orders = P_Order::whereBetween('p__orders.created_at', [$start, $end])->get();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });
        } else {
            $p_orders = P_Order::all();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });
        }

        return view('admin.reports.all-purchase-orders', compact('clients', 'p_orders', 'status', 'agents', 'start', 'end'));
    }

    public
    function getPurchaseOrdersByAccountManager(Request $request)
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
        if ($start != "" && $end != "" && $status != "") {
            $p_orders = P_Order::whereBetween('p__orders.created_at', [$start, $end])->get();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });
        } else {
            $p_orders = P_Order::all();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });
        }

        return view('admin.reports.agent-wise-purchase-orders',
            compact('po', 'status', 'branch', 'agents', 'start', 'end', 'p_orders'));
    }

    public
    function getPurchaseOrdersByClient(Request $request)
    {
        $clients = Client::all();
        $branch = ClientsBranch::where('client_id')->get();
        $start = $request->from;
        $end = $request->to;
        if ($start != "" && $end != "") {
            $p_orders = P_Order::whereBetween('p__orders.created_at', [$start, $end])->get();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });
        } else {
            $p_orders = P_Order::all();
            $p_orders->transform(function ($p_orders, $key) {
                $p_orders->bucket = unserialize($p_orders->bucket);
                return $p_orders;
            });
        }
        $po = Client::find($request->client);
        $status = $request->postatus;

        return view('admin.reports.client-wise-purchase-orders', compact('clients', 'po', 'status', 'start', 'end', 'branch', 'p_orders'));
    }

    public
    function getPriceListByAccMgr()
    {
        $users = User::all();
        $branchs = "";
        $clients = "";
        $s_user = "";
        return view('admin/reports/account-manager-wise-price-list', compact('users', 'branchs', 'clients', 's_user'));
    }

    public
    function getPLByAccMgr(Request $request)
    {
        $users = User::all();

        $branchs = ClientsBranch::where('agent_id', $request->agent)->orderby('client_id')->get();
        $clients = Client::all();
        $s_user = User::find($request->agent);

        return view('admin/reports/account-manager-wise-price-list', compact('users', 'branchs', 'clients', 's_user'));
    }

    public
    function getPriceListByClient(Client $client, $start, $end)
    {
        if ($start != 'n' && $end != 'n') {
            return Client_Product::whereBetween('client__products.created_at', array(new DateTime($start), new DateTime($end)))->get();
        } else {
            return $client->client_products;
        }
    }

    public
    function change_status($id, $status)
    {
        $po = P_Order::find($id);

        $po->update(['status' => $status]);

        $poh = new PorderHistory();
        $poh->po_id = $po->id;
        $poh->po_datetime = $po->updated_at;
        $poh->status = $po->status;
        $poh->save();

        $users = $po->client_branch->client_user;

        $agent = $po->cam;

        $procument = ['shehanm@ewisl.net', 'bimalka@ewisl.net', 'harsha@ewisl.net', 'hashanp@ewisl.net', 'damayanthik@ewisl.net', 'chanakah@ewisl.net'];
        if ($status === "OP") {
            foreach ($users as $usr) {
                $user = User::find($usr->user_id);
                Mail::to($user)->send(new PoOnProcess($user, $po));
                Mail::to($agent)->send(new PoOnProcess($user, $po));
            }
        } elseif ($status === "CH") {
            foreach ($users as $usr) {
                $user = User::find($usr->user_id);
                Mail::to($user)->send(new PoCreditHold($user, $po));
                Mail::to($agent)->send(new PoCreditHold($user, $po));
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
        }elseif ($status === "CN") {
            $po->bucket = unserialize($po->bucket);
            foreach ($users as $usr) {
                $user = User::find($usr->user_id);
                Mail::to($user)->send(new PoCancelled($user, $po));
                Mail::to($agent)->send(new PoCancelled($user, $po));
                Mail::to($procument)->send(new PoCancelled($user, $po));
                Mail::to($agent->sector_head)->send(new PoCancelled($user, $po));
            }
        }
        return back();
    }

    public
    function getAddToBucket(Request $request)
    {
        $product = Client_Product::find($request->id);
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $bucket->add($product, $product->product->part_no, $product->special_price, $request->Qty);
        $request->session()->put('bucket', $bucket);
        return back();
    }

    public
    function getBucket()
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

    public
    function remove_item($part_no)
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
        if (Session::has('User')) {
            if (!Session::has('bucket')) {
                return view('user/bucket');
            }
            $bucket = Session::get('bucket');
            $order = new P_Order();
            $file = $request->hasFile('file') ? 'storage/' . Storage::disk('local')->put('/checkout', $request->file('file')) : null;
            $user = User::find(Session::get('User'));
            $order->clients_branch_id = $user->c_user->client_branch->id;
            $order->bucket = serialize($bucket);

            $order->cp_name = $request->input('cp_name');
            $order->cp_branch = $request->input('cp_branch');
            $order->cp_telephone = $request->input('cp_telephone');
            $order->cp_address = $request->input('cp_address');
            $order->file = $file;
            $order->del_branch = $request->input('del_branch');
            $order->del_cp = $request->input('del_cp');
            $order->del_tp = $request->input('del_tp');
            $order->del_address = $request->input('del_address');
            $order->del_notes = $request->input('del_notes');
            $order->status = "P";
            $order->agent_id = $user->c_user->client_branch->agent_id;


            $order->save();

            $poh = new PorderHistory();
            $poh->po_id = $order->id;
            $poh->po_datetime = $order->updated_at;
            $poh->status = $order->status;
            $poh->save();

            $agent = User::find($order->agent_id);
            $sHead = User::find($agent->section_head_id);
            $order->bucket = unserialize($order->bucket);
            $procument = ['shehanm@ewisl.net', 'bimalka@ewisl.net', 'harsha@ewisl.net', 'hashanp@ewisl.net', 'damayanthik@ewisl.net', 'chanakah@ewisl.net'];

            //send the notification to client
            Mail::to($user)->send(new PoSentSuccessfully($user, $order));
            Mail::to($agent)->send(new PoToAdministration($user, $order));
            Mail::to($sHead)->send(new PoToSectionHeads($user, $order, $agent));
            Mail::to($procument)->send(new PoToProcument($user, $order, $agent));


            Session::forget('bucket');
            return redirect('/');
        } else
            return redirect('/');
    }

    public
    function getHistory()
    {
        if (Session::has('User')) {
            $orders = P_Order::where('clients_branch_id', User::find(Session::get('User'))->c_user->client_branch->id)->orderBy('id', 'desc')->get();
            if ($orders != null) {
                $orders->transform(function ($order, $key) {
                    $order->bucket = unserialize($order->bucket);
                    return $order;
                });
            }
            return view('user/history', compact('orders'));
        } else
            return redirect('/');
    }

    public
    function getPurchaseOrder()
    {
        $from = '';
        $to = '';

        if (Session::has('User')) {
            if (Session::get('User') == 1)
                $porders = P_Order::orderBy('id', 'desc')->groupBy()->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 6)
                $porders = P_Order::orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = P_Order::orderBy('id', 'desc')->paginate(config('const.PAGINATE'));


            return view('admin/clients/purchase-orders-view', compact('porders', 'from', 'to'));
        } else
            return redirect('/');
    }

    public
    function getPurchaseOrders($from, $to, $status)
    {
        if (Session::has('User')) {
            if (Session::get('User') == 1) {
                if ($from != '' && $to != '')
                    $porders = P_Order::whereBetween('created_at', [$from, $to])
                        ->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));

            } else
                $porders = User::find(Session::get('User'));

            return view('admin/clients/purchase-orders-view', compact('porders', 'from', 'to'));
        } else
            return redirect('/');
    }

    public
    function ajaxPurchaseOrderStatus($from, $to, $status)
    {
        if ($from != '' && $to != '' && $status != '' && $status != 'a')
            $porders = P_Order::whereBetween('p__orders.created_at', [$from, $to])
                ->where('p__orders.status', $status)
                ->join('clients_branches', 'p__orders.clients_branch_id', 'clients_branches.id')
                ->join('clients', 'clients_branches.client_id', 'clients.id')
                ->join('users', 'p__orders.agent_id', 'users.id')
                ->select('p__orders.id', 'p__orders.created_at', 'p__orders.del_branch', 'p__orders.updated_at', 'clients.name', 'p__orders.status', 'p__orders.file', 'users.name as user')
                ->get();
        else if ($from != '' && $to != '' && $status == 'a')
            $porders = P_Order::whereBetween('p__orders.created_at', [$from, $to])
                ->join('clients_branches', 'p__orders.clients_branch_id', 'clients_branches.id')
                ->join('clients', 'clients_branches.client_id', 'clients.id')
                ->join('users', 'p__orders.agent_id', 'users.id')
                ->select('p__orders.id', 'p__orders.created_at', 'p__orders.del_branch', 'p__orders.updated_at', 'clients.name', 'p__orders.status', 'p__orders.file', 'users.name as user')
                ->get();
        else
            $porders = P_Order::where('status', 'P')->get();

        $response = "";
        foreach ($porders as $porder) {
            if ((integer)$this->getDateDiff($porder->created_at) > (integer)(config('const.P_Order_Pending_Timeout')) && ($porder->status == "P" || $porder->status == "PC"))
                $response = $response . "<tr class='error_tr'>";
            else $response = $response . "<tr>";

            $response = $response . "<td>" . $porder->id . "</td><td>" . $porder->created_at . "</td><td>" . $porder->name .
                "</td><td>" . $porder->del_branch . "</td><td>" . $porder->user . "</td><td>";
            if ($porder->file != null)
                $response = $response . "<a href='/" . $porder->file . "'>Download Attachment</a>";
            else
                $response = $response . "No Attachment";

            $response = $response . "</td><td><form method='get' id='" . $porder->id . "' action=''>" .
                "<input type='hidden' id='id' name='id' value='" . $porder->id . "'>" .
                "<select id=" . $porder->id . " name='postatus' class='form-control postatus'>" .
                "<option value='P' ";
            if ($porder->status == 'P')
                $response = $response . "selected";
            $response = $response . ">Pending </option>" .
                "<option value='OP' ";
            if ($porder->status == 'OP')
                $response = $response . "selected";
            $response = $response . ">Processing </option>" .
                "<option value='PC' ";
            if ($porder->status == 'CH')
                $response = $response . "selected";
            $response = $response . ">Credit Hold </option>" .
                "<option value='CH' ";
            if ($porder->status == 'PC')
                $response = $response . "selected";
            $response = $response . ">Partial Completed </option>" .
                "<option value='C' ";
            if ($porder->status == 'C')
                $response = $response . "selected";
            $response = $response . ">Completed </option>" .
                "</select>" .
                "</form></td><td><a target='_blank' href='/admin/manage-clients/po-details/" . $porder->id .
                "' class='btn btn-success btn-outline'>Update Status / View Order</a></td></tr>";
        }

        return $response;
    }

    public
    function pendingPurchaseOrder()
    {
        $from = '';
        $to = '';
        if (Session::has('User')) {
//            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
//                $porders = P_Order::where('status', 'P')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
//            else
//                $porders = User::find(Session::get('User'));

            if (Session::get('User') == 1)
                $porders = P_Order::where('status', 'P')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::where('status', 'P')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 6)
                $porders = P_Order::where('status', 'P')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = P_Order::where('status', 'P')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));

            return view('admin/clients/purchase-orders-pending', compact('porders', 'from', 'to'));
        } else
            return redirect('/');
    }

    public
    function pendingPurchaseOrders($from, $to)
    {

        if (Session::has('User')) {
            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::whereBetween('created_at', [$from, $to])
                    ->where('status', 'P')
                    ->orderBy('id', 'desc')
                    ->paginate(config('const.PAGINATE'));
            else
                $porders = User::find(Session::get('User'));

            return view('admin/clients/purchase-orders-pending', compact('porders', 'from', 'to'));
        } else
            return redirect('/');
    }

//    public function
    public
    function processingPurchaseOrder()
    {
        $from = '';
        $to = '';
        if (Session::has('User')) {
            if (Session::get('User') == 1)
                $porders = P_Order::where('status', 'OP')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::where('status', 'OP')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 6)
                $porders = P_Order::where('status', 'OP')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = P_Order::where('status', 'OP')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));

            return view('admin/clients/purchase-orders-processing', compact('porders', 'from', 'to'));
        } else
            return redirect('/');
    }

    public
    function processingPurchaseOrders($from, $to)
    {
        if (Session::has('User')) {
            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::whereBetween('created_at', [$from, $to])
                    ->where('status', 'OP')
                    ->orderBy('id', 'desc')
                    ->paginate(config('const.PAGINATE'));
            else
                $porders = User::find(Session::get('User'));
            return view('admin/clients/purchase-orders-processing', compact('porders', 'from', 'to'));
        } else
            return redirect('/');
    }

    public
    function CreditHoldPurchaseOrder()
    {
        $from = '';
        $to = '';
        if (Session::has('User')) {
//            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
//                $porders = P_Order::where('status', 'CH')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
//            else
//                $porders = User::find(Session::get('User'));

            if (Session::get('User') == 1)
                $porders = P_Order::where('status', 'CH')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::where('status', 'CH')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 6)
                $porders = P_Order::where('status', 'CH')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = P_Order::where('status', 'CH')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));

            return view('admin/clients/purchase-orders-credithold', compact('porders', 'from', 'to'));

        } else
            return redirect('/');
    }

    public
    function CreditHoldPurchaseOrders($from, $to)
    {
        if (Session::has('User')) {
            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::whereBetween('created_at', [$from, $to])->where('status', 'CH')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = User::find(Session::get('User'));
            return view('admin/clients/purchase-orders-credithold', compact('porders', 'from', 'to'));
        } else
            return redirect('/');
    }

    public
    function getCreditHoldPoCount()
    {
        if (Session::has('User')) {
            $user = User::find(Session::get('User'));
            if ($user->id == 1 || $user->designation_id == 5 || $user->designation_id == 7) {
                $porder = P_Order::where('status', 'CH')->count();
            } else {
                $porder = 0;
                if ($user->designation_id == 6) {
                    foreach (User::where('section_head_id', $user->id)->get() as $cbranch) {
                        foreach (ClientsBranch::where('agent_id', $cbranch->id)->get() as $tbranch) {
                            $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'CH']])->count();
                        }
                    }
                    foreach (User::where('section_head_id', $cbranch->id)->get() as $sbranch) {
                        foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                            $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'CH']])->count();
                        }
                    }
                    foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                        $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'CH']])->count();
                    }
                } else {
                    foreach (User::where('section_head_id', $user->id)->get() as $sbranch) {
                        foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                            $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'CH']])->count();
                        }
                    }
                    if (ClientsBranch::where('agent_id', $user->id)->count() > 0) {
                        foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                            if (P_Order::where('clients_branch_id', $cbranch->id)->count() > 0) {
                                $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'CH']])->count();
                            }
                        }
                    }
                }
            }
            return Response::json($porder);
        } else return redirect('/');
    }

    public
    function getCancelledPoCount()
    {
        if (Session::has('User')) {
            $user = User::find(Session::get('User'));
            if ($user->id == 1 || $user->designation_id == 5 || $user->designation_id == 7) {
                $porder = P_Order::where('status', 'CN')->count();
            } else {
                $porder = 0;
                if ($user->designation_id == 6) {
                    foreach (User::where('section_head_id', $user->id)->get() as $cbranch) {
                        foreach (ClientsBranch::where('agent_id', $cbranch->id)->get() as $tbranch) {
                            $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'CN']])->count();
                        }
                    }
                    foreach (User::where('section_head_id', $cbranch->id)->get() as $sbranch) {
                        foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                            $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'CN']])->count();
                        }
                    }
                    foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                        $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'CN']])->count();
                    }
                } else {
                    foreach (User::where('section_head_id', $user->id)->get() as $sbranch) {
                        foreach (ClientsBranch::where('agent_id', $sbranch->id)->get() as $tbranch) {
                            $porder += P_Order::where([['clients_branch_id', $tbranch->id], ['status', 'CN']])->count();
                        }
                    }
                    if (ClientsBranch::where('agent_id', $user->id)->count() > 0) {
                        foreach (ClientsBranch::where('agent_id', $user->id)->get() as $cbranch) {
                            if (P_Order::where('clients_branch_id', $cbranch->id)->count() > 0) {
                                $porder += P_Order::where([['clients_branch_id', $cbranch->id], ['status', 'CN']])->count();
                            }
                        }
                    }
                }
            }
            return Response::json($porder);
        } else return redirect('/');
    }

    public
    function getProcessingPoCount()
    {
        if (Session::has('User')) {
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
        } else return redirect('/');
    }

    public
    function getPendingPoCount()
    {
        if (Session::has('User')) {
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
        } else return redirect('/');
    }

    public
    function getPCompletePoCount()
    {
        if (Session::has('User')) {
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
        } else return redirect('/');
    }

    public
    function pcPurchaseOrder()
    {
        $from = '';
        $to = '';
        if (Session::has('User')) {
//            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
//                $porders = P_Order::where('status', 'PC')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
//            else
//                $porders = User::find(Session::get('User'));

            if (Session::get('User') == 1)
                $porders = P_Order::where('status', 'PC')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::where('status', 'PC')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 6)
                $porders = P_Order::where('status', 'PC')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = P_Order::where('status', 'PC')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));


            return view('admin/clients/purchase-orders-partial-completed', compact('porders', 'from', 'to'));
        } else return redirect('/');
    }

    public
    function pcPurchaseOrders($from, $to)
    {
        if (Session::has('User')) {
            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::whereBetween('created_at', [$from, $to])->where('status', 'PC')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = User::find(Session::get('User'));
            return view('admin/clients/purchase-orders-partial-completed', compact('porders', 'from', 'to'));
        } else return redirect('/');
    }

    private
    function getDateDiff($date)
    {
        return (Carbon::parse($date)->diff(Carbon::now())->days);
    }

    public
    function CompletedPurchaseOrder()
    {
        $from = '';
        $to = '';
        if (Session::has('User')) {
//            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
//                $porders = P_Order::where('status', 'C')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
//            else
//                $porders = User::find(Session::get('User'));

            if (Session::get('User') == 1)
                $porders = P_Order::where('status', 'C')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::where('status', 'C')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            elseif (User::find(Session::get('User'))->designation_id == 6)
                $porders = P_Order::where('status', 'C')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = P_Order::where('status', 'C')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));

            return view('admin/clients/purchase-orders-completed', compact('porders', 'from', 'to'));
        } else return redirect('/');
    }

    public
    function CompletedPurchases($from, $to)
    {
        if (Session::has('User')) {
            if (Session::get('User') == 1 || User::find(Session::get('User'))->designation_id == 5 || User::find(Session::get('User'))->designation_id == 7)
                $porders = P_Order::whereBetween('created_at', [$from, $to])->where('status', 'C')->orderBy('id', 'desc')->paginate(config('const.PAGINATE'));
            else
                $porders = User::find(Session::get('User'));

            return view('admin/clients/purchase-orders-completed', compact('porders', 'from', 'to'));
        } else return redirect('/');
    }

    public
    function CompletedPurchaseOrders()
    {
        $clients = Client::all();
        $po = "";
        $status = "";
        $start = "";
        $end = "";
        return view('admin/reports/client-wise-purchase-orders', compact('clients', 'po', 'status', 'start', 'end'));
    }

    public
    function AgentPurchaseOrder()
    {
        $clients = Client::all();
//        $branch = ClientsBranch::all();
        $agents = User::all();
//
        $po = "";
        $status = "";
        $start = "";
        $end = "";
        return view('admin.reports.agent-wise-purchase-orders', compact('clients', 'po', 'status', 'start', 'end', 'agents', 'branch'));
    }

    public
    function SectorHeadPurchaseOrder()
    {
        $clients = Client::all();
        $branch = ClientsBranch::all();
//        $agents = User::where('designation_id', '4')->get();
        $sheads = User::all();

        $po = "";
        $status = "";
        $start = "";
        $end = "";
        return view('admin.reports.sectorhead-wise-purchase-orders', compact('clients', 'po', 'status', 'start', 'end', 'sheads', 'branch'));
    }

    public
    function AllPurchaseOrder()
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
    function getPODetails(P_Order $id)
    {
        $order = $id;
        $order->bucket = unserialize($order->bucket);
        $branch = ClientsBranch::find($order->clients_branch_id);
        return view('admin/clients/detail-orders', compact('order', 'branch'));
    }

    public
    function historyPODetails(P_Order $id)
    {
        if (Session::has('User')) {
            $order = $id;
            $order->bucket = unserialize($order->bucket);
            $branch = Session::has('User') ? User::find(Session::get('User'))->c_user->client_branch : null;

            return view('user/detail-orders', compact('order', 'branch'));
        } else return redirect('/');
    }

}
