<?php

namespace App\Http\Controllers;

use App\ClientsBranch;
use App\Clientuser;
use App\Client;
use App\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function get_client_Branches(Client $client_id){
        $branches = $client_id->client_branch;
        return Response::json($branches);
    }

    public function index()
    {
        $id = "";
        $clients = Client::all();
        return view('/admin/clients/manage-client', compact('clients', 'id'));
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

        return redirect('/admin/manage-clients/create-clientuser');
    }

    public function cp_update(Request $request)
    {
        $client = Clientuser::find($request->client_id);
        $client->update(['cp_name' => $request->cp_name,
            'cp_designation' => $request->cp_designation,
            'clients_branch_id' => $request->clients_branch_id,
            'cp_telephone' => $request->cp_telephone,
            'cp_email' => $request->cp_email,
            'user_id' => $request->user_id]);
        return redirect('/client-profile/' . ClientsBranch::find($request->clients_branch_id)->id);//User::find(Session::get('User'))->clientuser->first()->client->id);
    }

    public function update(Request $request)
    {
        $users = User::all();
        $clients = Client::find($request->id);
        $logo = $request->hasFile('logo') ? 'storage/' . Storage::disk('local')->put('/images', $request->file('logo')) : null;
        $clients->update(['user_id' => $request->user_id, 'address' => $request->address, 'telephone' => $request->telephone, 'email' => $request->email,
            'logo' => $logo, 'color' => $request->color]);
        return view('/admin/clients/manage-client', compact('clients', 'users'));
    }

    public function show(Clientuser $id)
    {
        return view('user.user', compact('id'));
    }

    public function editClientProfile(Clientuser $id)
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
