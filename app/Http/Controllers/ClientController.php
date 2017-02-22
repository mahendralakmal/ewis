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
        Client::create($request->all());
        return redirect('/admin/users/create-users');
    }

    public function cp_update(Request $request)
    {
        $client = User::find($request->user_id)->client;
        $client->update(['cp_name' => $request->cp_name,
            'cp_designation' => $request->cp_designation, 'cp_branch' => $request->cp_branch,
            'cp_telephone' => $request->cp_telephone, 'cp_email' => $request->cp_email, 'user_id' => $request->user_id]);

        return redirect('client-profile/'.User::find(\Illuminate\Support\Facades\Session::get('User'))->client->id);
    }

    public function update(Request $request)
    {
        $users = User::all();
        $client = User::find($request->user_id)->client;
        $logo = $request->hasFile('logo')? 'storage/'.Storage::disk('local')->put('/images', $request->file('logo')):null;
        $client->update(['address' => $request->address, 'telephone' => $request->telephone, 'email' => $request->email,
            'logo' => $logo, 'color' => $request->color, 'cp_name' => $request->cp_name,
            'cp_designation' => $request->cp_designation, 'cp_branch' => $request->cp_branch,
            'cp_telephone' => $request->cp_telephone, 'cp_email' => $request->cp_email]);
        return view('/admin/clients/manage-client', compact('users'));
    }

    public function show(Client $id){
//        return $id;
        return view('user.user', compact('id'));
    }

    public function editClientProfile(Client $id){
        return view('user/edit-user', compact('id'));
    }

    public function approval(){
        $users = User::where('designation_id',4)->get();
        return view('admin/clients/approval-client', compact('users'));
    }

    public function approved(User $id)
    {
        $id->update(['approval' => 1]);
        return redirect('/admin/manage-clients/approval');
    }

    public function unapproved(User $id)
    {
        $id->update(['approval' => 0]);
        return redirect('/admin/manage-clients/approval');
    }
}
