<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $users = User::all();
        $clients = Client::all();
        return view('/admin/clients/manage-client', compact('users', 'clients'));
    }

    public function update_profile(User $id){

        return view('/admin/clients/client-profile', compact('id'));
    }

    public function store(Request $request){
//        return $request->all();
        Client::create($request->all());
        return back();
    }
}
