<?php

namespace App\Http\Controllers;

use App\Client;
use App\Designation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

        if (User::find($user->id)->designation->designation === 'client' || User::find($user->id)->designation->designation === 'Client') {
            return redirect('/admin/manage-clients/update-profile/' . $user->id);
        } else {
            return back();
        }
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

        if (User::find($user->id)->designation->designation === 'client' || User::find($user->id)->designation->designation === 'Client') {
            return redirect('/admin/manage-clients/update-profile/' . $user->id);
        } else {
            return back();
        }
    }

    public function mange_user()
    {
        $id = "";
        $users = User::where('designation_id', '!=', 4)->get();
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

    public function welcome()
    {
        if (Session::has('LoggedIn') && Session::get('LoggedIn')) {
            return redirect('/client-profile/' . User::find(Session::get('User'))->client->id . '/brands');
//            return redirect('/client-profile/' . $client->id .'/brands');
        } else {
            $error = '';
            return view('welcome', compact('error'));
        }
    }

    public function signin(Request $request)
    {
        Session::put('LoggedIn', false);
        $user = User::where([['email', $request->email], ['approval', 1]])->first();
        if (!$user == null && Hash::check($request->password, $user->password)) {
            if ($user->designation->designation == 'Client' || $user->designation->designation == 'Client') {
                $client = $user->client;
                Session::put('LoggedIn', true);
                Session::put('User', $user->id);
                Session::put('BaseColor', $user->client->color);
                return redirect('/client-profile/' . $client->id . '/brands');
            } else {
                Session::put('LoggedIn', true);
                Session::put('User', $user->id);
                Session::put('Type', $user->designation->designation);
                Session::put('ip', $request->ip());
                return redirect('/admin');
            }
        } else {
            $error = 'Please check the email and password...!';
            return view('welcome', compact('error'));
        }
    }

    public function signout()
    {
        Session::forget('LoggedIn');
        Session::forget('User');
        Session::forget('BaseColor');
        Session::flush();
        return redirect('/');
    }
}
