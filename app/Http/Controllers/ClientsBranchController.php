<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientsBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class ClientsBranchController extends Controller
{
    public function remove(ClientsBranch $id)
    {
        $id->update([
            'activation' => 1
        ]);
        return back();
    }

    public function create()
    {
        $id = '';
        $clients = Client::all();
        return view('/admin/clients/client-branch', compact('clients', 'id'));
    }

    public function store(Request $request)
    {

        $this->validate(request(),
            [
                'client_id' => 'required',
                'name' => 'required|max:100',
                'address' => 'required',
                'contact_no' => 'required',
                'email' => 'required|email',
            ]
        );

        $client = Client::find($request->client_id);
        if($client->client_branch->count()>0)
        {
            foreach ($client->client_branch as $branch){

                if(($request->name == $branch->name) && ($branch->activation != 1))
                {
                    Session::flash('error_message', 'Branch Already Exists....!!!,
You may Add a Different Branch to the Client Organization, Please verify
and enter the details again.');
                    return back();
                }
                else
                {
                    ClientsBranch::create($request->all());
                    Session::flash('success_message', 'successfully added...!');
                    return back();
                }
            }
        }
    }
}
