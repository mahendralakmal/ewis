<?php

namespace App\Http\Controllers;

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

    public function update(Request $request){
//        return $request->all();
        $user = User::find($request->id);
        $user->update([
            'password'=>Hash::make($request->password),
            'name'=>$request->name,
            'designation_id'=>$request->designation_id,
            'nic_pass'=>$request->nic_pass
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
        return back();
    }
}
