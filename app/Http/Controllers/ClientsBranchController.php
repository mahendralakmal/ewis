<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientsBranch;
use App\User;
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
        $user = User::find(session('User'));
        if ($user->id != 1)
            $clients = ClientsBranch::where('agent_id', $user->id)->get();
        else
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
        if ($client->client_branch->count() > 0) {
            if (ClientsBranch::where([['name', 'Branch2'], ['activation', 0], ['client_id', 1]])->count() > 0) {
                Session::flash('error_message', 'Branch Already Exists....!!!, You may Add a Different Branch to the 
                Client Organization, Please verify and enter the details again.');
            } else {
                ClientsBranch::create($request->all());
                Session::flash('success_message', 'successfully added...!');
            }
        }
        return back();
    }
}
