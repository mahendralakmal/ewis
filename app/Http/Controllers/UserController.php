<?php

namespace App\Http\Controllers;

use App\Client;
use App\Designation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('sampath/brands');
    }

    public function create()
    {
        $id = "";
        $users = User::all();
        $designations = Designation::all();
        return view('/admin/users/create-user', compact('users', 'designations', 'id'));
    }

    public function edit(User $id)
    {
        $users = User::all();
        $designations = Designation::all();
        return view('/admin/users/create-user', compact('users', 'designations', 'id'));
    }

    public function delete(Request $request)
    {
        $user = User::find($request->hidId);
        $user->update([
            'deleted' => 1
        ]);
        return redirect('/admin/users/create-users');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->update([
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'designation_id' => $request->designation_id,
            'nic_pass' => $request->nic_pass
        ]);
        return redirect('/admin/users/create-users');
    }

    public function store(Request $request)
    {
        $user = new User();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->designation_id = $request->designation_id;
        $user->nic_pass = $request->nic_pass;
        $user->save();

        if(User::find($user->id)->designation->designation === 'client' || User::find($user->id)->designation->designation === 'Client'){
            return redirect('/admin/manage-clients/update-profile/'.$user->id);
        } else {
            return back();
        }
    }

    public function mange_user()
    {
        $id = "";
        $users = User::all();
        $designations = Designation::all();
        return view('/admin/users/manage-users', compact('users', 'designations', 'id'));
    }

    public function approved(User $id)
    {
        $id->update(['approval' => 1]);
        return redirect('/admin/users/manage-users');
    }

    public function unapproved(User $id)
    {
        $id->update(['approval' => 0]);
        return redirect('/admin/users/manage-users');
    }

    public function welcome(){
        $error = '';
        return view('welcome', compact('error'));
    }

    public function signin(Request $request){
        $user = User::where('email', $request->email)->first();
        if(Hash::check($request->password, $user->password)){
            $client = $user->client;
            return redirect('/client-profile/'.$client->id);
        } else {
            $error = 'Please check the email and password...!';
            return view('welcome', compact('error'));
        }
    }
}
