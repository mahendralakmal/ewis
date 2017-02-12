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
        return view('/admin/clients/manage-client', compact('users'));
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
