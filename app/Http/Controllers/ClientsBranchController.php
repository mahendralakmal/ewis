<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientsBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientsBranchController extends Controller
{
    public function create(){
        $id = '';
        $clients = Client::all();
        return view('/admin/clients/client-branch', compact('clients','id'));
    }

    public function store(Request $request){

        $this->validate(request(), [
            'client_id' => 'required',
            'name' => 'required|unique:brands|max:100',
            'address' => 'required',
            'contact_no' => 'required',
            'email' => 'required|email',
        ]);

        ClientsBranch::create($request->all());
        Session::flash('success', 'successfully added...!');
        return back();
    }
}
