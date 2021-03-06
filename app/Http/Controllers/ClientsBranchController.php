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

    public function edit(ClientsBranch $id)
    {
        if (Session::has('User')) {
            $user = User::find(session('User'));
            if ($user->id != 1)
                $clients = $user;
//                Client::where('user_id',$user->id)->get();
            else
                $clients = Client::all();
            return view('/admin/clients/client-branch', compact('clients', 'id'));
        } else {
            return redirect('/');
        }
    }

    public function create()
    {
        $id = '';
        if (Session::has('User')) {
        $user = User::find(session('User'));
        if ($user->id != 1)
            $clients = $user;
//                Client::where('user_id',$user->id)->get();
        else
            $clients = Client::all();
        return view('/admin/clients/client-branch', compact('clients', 'id'));
        } else {
            return redirect('/');
        }
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
            if (ClientsBranch::where([['name', $request->name], ['activation', 0], ['client_id', $client->id]])->count() > 0) {
                Session::flash('error_message', 'Branch Already Exists....!!!, You may Add a Different Branch to the 
                Client Organization, Please verify and enter the details again.');
            } else {
                ClientsBranch::create($request->all());
                Session::flash('success_message', 'successfully added...!');
            }
        } else {
            ClientsBranch::create($request->all());
            Session::flash('success_message', 'successfully added...!');
        }
        return back();
    }

    public function update(Request $request)
    {
        $cbranch = ClientsBranch::find($request->id);
        $cbranch->update($request->all());
        return back();
    }
}
