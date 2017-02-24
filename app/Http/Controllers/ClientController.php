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
        $clients = Client::all();
        $users = User::all();
        return view('/admin/clients/manage-client', compact('users', 'clients'));
    }

    public function create_profile()
    {
        $id = null;
        $clients = Client::orderBy('name')->get();
        return view('/admin/clients/client-profile', compact('id', 'clients'));
    }

    public function update_profile(Client $id)
    {
        $clients = Client::orderBy('name')->get();
        return view('/admin/clients/client-profile', compact('id', 'clients'));
    }

    public function store(Request $request)
    {
//        Client::create($request->all());
        $client = new Client();
        $logo = $request->hasFile('logo') ? 'storage/' . Storage::disk('local')->put('/images', $request->file('logo')) : null;
        $client->user_id = $request->user_id;
        $client->name = $request->name;
        $client->address = $request->address;
        $client->telephone = $request->telephone;
        $client->email = $request->email;
        $client->logo = $logo;
        $client->color = $request->color;
        $client->save();

        return redirect('/admin/users/create-users');
    }

    public function cp_update(Request $request)
    {
        $client = User::find($request->user_id)->client;
        $client->update(['cp_name' => $request->cp_name,
            'cp_designation' => $request->cp_designation, 'cp_branch' => $request->cp_branch,
            'cp_telephone' => $request->cp_telephone, 'cp_email' => $request->cp_email, 'user_id' => $request->user_id]);

        return redirect('client-profile/' . User::find(\Illuminate\Support\Facades\Session::get('User'))->client->id);
    }

    public function update(Request $request)
    {
//        return $request->all();
        $users = User::all();
        $client = Client::find($request->id);
        $logo = $request->hasFile('logo') ? 'storage/' . Storage::disk('local')->put('/images', $request->file('logo')) : null;
        $client->update(['user_id' => $request->user_id, 'address' => $request->address, 'telephone' => $request->telephone, 'email' => $request->email,
            'logo' => $logo, 'color' => $request->color]);
        return view('/admin/clients/manage-client', compact('users'));
    }

    public function show(Client $id)
    {
        return view('user.user', compact('id'));
    }

    public function editClientProfile(Client $id)
    {
        return view('user/edit-user', compact('id'));
    }

    public function approval()
    {
        $users = User::where('designation_id', 4)->get();
        return view('admin/clients/approval-client', compact('users'));
    }

    public function approved(Client $id)
    {
        $id->update(['approval' => 1]);
        return redirect('/admin/manage-clients/approval');
    }

    public function unapproved(Client $id)
    {
        $id->update(['approval' => 0]);
        return redirect('/admin/manage-clients/approval');
    }
}
