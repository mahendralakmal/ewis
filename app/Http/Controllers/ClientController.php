<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('/admin/clients/manage-client', compact('users'));
    }

    public function update_profile(User $id)
    {

        return view('/admin/clients/client-profile', compact('id'));
    }

    public function store(Request $request)
    {
//        return $request->all();
        Client::create($request->all());
        return back();
    }

    public function update(Request $request)
    {
        $users = User::all();
        $client = User::find($request->user_id)->client;
        $logo = $request->hasFile('logo')? 'storage/app/'.Storage::disk('local')->put('/clientImg', $request->file('logo')):null;
        $client->update(['address' => $request->address, 'telephone' => $request->telephone, 'email' => $request->email,
            'logo' => $logo, 'color' => $request->color, 'cp_name' => $request->cp_name,
            'cp_designation' => $request->cp_designation, 'cp_branch' => $request->cp_branch,
            'cp_telephone' => $request->cp_telephone, 'cp_email' => $request->cp_email]);
        return view('/admin/clients/manage-client', compact('users'));
    }

    public function show(Client $id)
    {
        return view('user.user', compact('id'));
    }
}
