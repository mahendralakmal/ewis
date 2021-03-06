<?php

namespace App\Http\Controllers;

use App\CCategory;
use App\Client;
use App\Client_Product;
use App\ClientAssignProductView;
use App\ClientsBranch;
use App\Designation;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Laravel\Scout\Searchable;

class ESearch extends Controller
{
    public function searchUser($designation, $index)
    {
        if ($designation == 2) {
            $produce = '';
            $users = User::search($index)->where('designation_id', $designation)->get();
            $header = '<table class="table"><thead><tr><td><h5>Organization</h5></td><td><h5>Branch / Department</h5></td><td><h5>Email</h5></td><td><h5>Name</h5></td><td class="col-md-3"></td></tr></thead><tbody>';
            foreach ($users as $user) {
                if ($user->approval == 0)
                    $approval = '<a href="/admin/manage-clients/client_user/' . $user->id . '/activate" class="btn btn-primary btn-outline">Approve</a>';
                else
                    $approval = '<a href="/admin/manage-clients/client_user/' . $user->id . '/deactivate" class="btn btn-danger btn-outline">Unapprove</a>';

                $produce .= '<tr><td>' . $user->c_user->client->name . '</td>
                        <td>' . $user->c_user->client_branch->name . '</td>
                        <td>' . $user->email . '</td>
                        <td>' . $user->name . '</td>
                        <td>
                        <form method="POST" action="/admin/users/delete"
                                                                      role="form">
                                                                    <a href="/admin/manage-clients/client_user/' . $user->id . '"
                                                                       class="btn btn-primary btn-outline">Profile</a>
                                                                    <a href="/admin/manage-clients/create-clientuser/' . $user->id . '"
                                                                       class="btn btn-primary btn-outline">Edit</a>
                                                                       <input type="hidden" name="_token" value="' . csrf_token() . '">
                                                                    ' . $approval . '<input type="hidden" id="hidId" name="hidId"value="{{ $user->id }}"></form></td></tr>';
            }
            $produce .= '</tbody></table>';
            return Response::json($header . $produce);
        } else {
            $produce = '';
            $users = User::search($index)->get();
            $header = '<table class="table"><thead><tr><td><h5>Email</h5></td><td><h5>Name</h5></td><td><h5>Designation</h5></td><td></td></tr></thead><tbody>';
            foreach ($users as $user) {
                if ($user->designation_id != 2) {
                    $produce .= '
                    <tr>
                        <td>' . $user->email . '</td>
                        <td>' . $user->name . '</td>
                        <td>' . $user->designation->designation . '</td>
                        <td>
                            <a href="/admin/users/create-users/{{ $user->id }}"
                               class="btn btn-primary btn-outline">Edit</a>
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" id="hidId" name="hidId" value="' . $user->id . '">
                        </td>
                    </tr>
                ';
                }
            }
            $produce .= '</tbody></table>';

            return Response::json($header . $produce);
        }
    }

    public function searchClients(User $user, $index)
    {
        $produce = '';
        $header = '<table class="table"><thead><tr><td><h5>Name</h5></td><td><h5>Email</h5></td><td><h5>Telephone</h5></td><td class="col-md-3"></td></tr></thead><tbody>';
        $results = Client::where('name','LIKE','%'.$index.'%')->get();
//        $results = Client::search($index)->get();

        foreach ($results as $key => $value) {
            $approval = (!$value->approval) ? '<a href="/admin/manage-clients/approved/' . $value->id . '" class="btn btn-primary btn-outline">Approve</a>' : '<a href="/admin/manage-clients/unapproved/' . $value->id . '" class="btn btn-danger btn-outline">Unapprove</a>';
            $produce .= '<tr><td>' . $value->name . '</td><td>' . $value->email . '</td><td>' . $value->telephone . '</td><td><a href="/admin/manage-clients/update-profile/' . $value->id . '"
                                                       class="btn btn-primary btn-outline">Edit</a>' . $approval . ' </td></tr>';
        }
        return Response::json($header . $produce);
    }

    public function searchCProducts(CCategory $c_category, $index)
    {
        $products = ClientAssignProductView::search($index)->where('c_category_id', $c_category->id)->get();
        $produce = '';
        $count = 0;

        foreach ($products as $key => $value) {
            $image = Product::find($value->product_id)->image;
            $vat_applicable = (Product::find($value->product_id)->vat_apply) ? 'Yes' : 'No';
            $special_price = Client_Product::find($value->id)->special_price;
            $produce .= '<form action="/client-profile/add-to-bucket" method="POST" class="side-by-side"><input type="hidden" name="_token" value="' . csrf_token() . '">
            <div class="row">
            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><input type="hidden" id="id" name="id" value="' . $value->id . '"><a href="/client-profile/' . $c_category->c_brand->client->client->id . '/' . $value->part_no . '">' . $value->part_no . '</a></div>
            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><img src="/' . $image . '" alt="product" class="img-responsive" height="25" width="30"></div>
            <div class="col-md-5 " style="border: 1px solid #dddddd; padding:5px; height:45px;"><a href="/client-profile/' . $c_category->c_brand->client->client->id . '/' . $value->part_no . '">' . $value->name . '</a></div>'
                . '<div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;">' . $vat_applicable . '</div>
            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><p>' . number_format($special_price, 2, ".", ",") . '</p></div>
            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><input style="width: 50px" align="right" type="number" min="1" value="1" name="Qty" id="Qty" class="form-controls"></div>
            <div class="col-md-2 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><input class="btn btn-success btn-sm" type="submit" value="Add To Bucket"></div></div></form>';
        }

        if (strlen($produce) > 0) {
            $top = '<div class="row"><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Part Number</div><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Product Image</div><div class="col-md-5 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Product Name</div><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Vat Applicalbe</div><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Unit Price(Rs.)</div><div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Quantity</div><div class="col-md-2 td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff"></div></div>';
            $produce = $top . $produce;
        } else {
            if (Session::has('User')) {
                $produce = '<div class="jumbotron text-center clearfix"><h2>No items found</h2><p><a href="{{ URL::previous() }}" class="btn btn-primary btn-lg" target="_blank">Category</a><a href="' . '/client-profile/' . User::find(Session::get('User'))->c_user->client_branch->client->id . '/brands' . '" class="btn btn-success btn-lg">Brand</a></p></div>';
            }
        }

        return Response::json($produce);
    }

    public function searchProducts($index)
    {
        $products = Product::search($index)->get();
        return Response::json($products);
    }
}
