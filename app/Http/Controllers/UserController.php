<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientsBranch;
use App\Designation;
use App\Privilege;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use App\mail\PoSentSuccessfully;

class UserController extends Controller
{
    public function StorePrivileges(Request $request)
    {
//        return $request->all();
        $user = User::find($request->user_id);
        $user->privilege()->create([
            'brand' => ($request->brand == "on") ? true : false,
            'category' => ($request->category == "on") ? true : false,
            'product' => ($request->product == "on") ? true : false,
            'add_user' => ($request->add_user == "on") ? true : false,
            'user_approve' => ($request->user_approve == "on") ? true : false,
            'designation' => ($request->designation == "on") ? true : false,
            'client_prof' => ($request->client_prof == "on") ? true : false,
            'client_users' => ($request->client_users == "on") ? true : false,
            'client_branch' => ($request->client_branch == "on") ? true : false,
            'view_po' => ($request->view_po == "on") ? true : false,
            'change_po_status' => ($request->change_po_status == "on") ? true : false,
            'created_user_id' => $request->user_id,
            'privilege' => ($request->privilege == "on") ? true : false,
            'assign_agent' => ($request->assign_agent == "on") ? true : false,
            'asign_brand' => ($request->asign_brand == "on") ? true : false,
            'asign_category' => ($request->asign_category == "on") ? true : false,
            'asign_product' => ($request->asign_product == "on") ? true : false,
            'product_cost' => ($request->product_cost == "on") ? true : false,
            'view_reports' => ($request->view_reports == "on") ? true : false,
            'manage_client' => ($request->manage_client == "on") ? true : false


        ]);
        return redirect('/admin/users/manage-users');
    }

    public function UpdatePrivileges(Request $request)
    {

//        return $request->all();
//        $privilege = (User::find($request->user_id))->privilege;

        $privilege = (User::find($request->user_id)->privilege);

        $privilege->update([
            'brand' => ($request->brand == "on") ? true : false,
            'category' => ($request->category == "on") ? true : false,
            'product' => ($request->product == "on") ? true : false,
            'add_user' => ($request->add_user == "on") ? true : false,
            'user_approve' => ($request->user_approve == "on") ? true : false,
            'designation' => ($request->designation == "on") ? true : false,
            'client_prof' => ($request->client_prof == "on") ? true : false,
            'client_users' => ($request->client_users == "on") ? true : false,
            'client_branch' => ($request->client_branch == "on") ? true : false,
            'view_po' => ($request->view_po == "on") ? true : false,
            'change_po_status' => ($request->change_po_status == "on") ? true : false,
            'created_user_id' => $request->user_id,
            'privilege' => ($request->privilege == "on") ? true : false,
            'assign_agent' => ($request->assign_agent == "on") ? true : false,
            'asign_brand' => ($request->asign_brand == "on") ? true : false,
            'asign_category' => ($request->asign_category == "on") ? true : false,
            'asign_product' => ($request->asign_product == "on") ? true : false,
            'product_cost' => ($request->product_cost == "on") ? true : false,
            'view_reports' => ($request->view_reports == "on") ? true : false,
            'manage_client' => ($request->manage_client == "on") ? true : false
        ]);
        return redirect('/admin/users/manage-users');
    }

    //below method is only for Super User Signup
    public function signup_store(Request $request)
    {
        $designation = new Designation();
        $designation->designation = "Super Admin";
        $designation->user_id = 1;
        $designation->save();

        $designation = new Designation();
        $designation->designation = "Client";
        $designation->user_id = 1;
        $designation->save();

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->designation_id = $request->designation_id;
        $user->nic_pass = $request->nic_pass;
        $user->user_id = $request->user_id;
        $user->approval = $request->approval;
        $user->section_head_id = null;
        $user->save();
        $user->privilege()->create([
            'brand' => true,
            'category' => true,
            'product' => true,
            'add_user' => true,
            'user_approve' => true,
            'designation' => true,
            'client_prof' => true,
            'client_users' => true,
            'client_branch' => true,
            'view_po' => true,
            'change_po_status' => true,
            'privilege' => true,
            'assign_agent' => true,
            'asign_brand' => true,
            'asign_category' => true,
            'asign_product' => true,
            'product_cost' => true,
            'view_reports' => true,
            'manage_client' => true,
            'created_user_id' => $request->user_id
        ]);

        Session::put('LoggedIn', true);
        Session::put('User', $request->user_id);
        Session::put('Type', $user->designation->designation);
        Session::put('ip', $request->ip());
        return redirect('/admin');
    }

    public function showPrivileges(User $user)
    {
        return view('/admin/users/manage-user-privileges', compact('user'));
    }

    public function signup()
    {

        if (!(Session::get('LoggedIn')) && (User::all()->count() == 0)) {
            return view('signup');
        } else {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $this->validate(request(),
            ['email' => 'required|unique:users|max:100'],
            ['email.unique' => 'E-mail Address Already Exists....!!!, Please verify and enter the details again.']
        );

        $user = new User();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->designation_id = $request->designation_id;
        $user->nic_pass = $request->nic_pass;
        $user->user_id = $request->user_id;
        $user->section_head_id = $request->section_head_id;
        $user->save();
        Session::flash('success', 'User successfully added...!');

        if (strtolower(User::find($user->id)->designation->designation) === 'client') {
            return redirect('/admin/manage-clients/client_user/' . $user->id);
        } else {
            return back();
        }
    }

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

    //Create client user
    public function client()
    {
        $id = "";
        $user = User::find(session('User'));
        if ($user->id != 1)
            $users = ClientsBranch::where('agent_id', $user->id)->get();
        else
            $users = User::all();

        $designation = Designation::find(2);
        return view('/admin/clients/create-clientuser', compact('users', 'designation', 'id'));
    }
    public function edit(User $id)
    {
        $users = User::all();
        $designations = Designation::all();
        return view('/admin/users/create-user', compact('users', 'designations', 'id'));
    }

    //Edit client user
    public function clientedit(User $id)
    {
        $users = User::all();
        $designation = Designation::find(2);
        return view('/admin/clients/create-clientuser', compact('users', 'designation', 'id'));
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
        $this->validate(request(), [
            'email' => 'required|max:100',
        ]);
        $user = User::find($request->id);
        $user->update([
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'designation_id' => $request->designation_id,
            'nic_pass' => $request->nic_pass
        ]);
        Session::flash('success', 'User successfully updated...!');

        if (strtolower(User::find($user->id)->designation->designation) === 'client') {
            return redirect('/admin/manage-clients/client_user/' . $user->id);
        } else {
            return back();
        }
    }

    public function mange_user()
    {
        $id = "";
        $designation = Designation::where('designation', 'Client')->first();
        $users = User::where('designation_id', '!=', $designation->id)->get();
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
        if (Session::has('LoggedIn') && Session::get('LoggedIn')) { //Check whether if the user already logged in
            return redirect('/client-profile/' . User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->id . '/brands');
        } else {
            if (!(User::all()->count()) == 0) { //Check if there is an user then redirected to signin page
                $error = '';
                return view('welcome', compact('error'));
            } else { //if there is not created user redirected to create super user
                return redirect('/signup');
            }
        }
    }

    public function signin(Request $request)
    {

        Session::put('LoggedIn', false);
        $user = User::where([['email', $request->email]])->first();

//        return $user;
        if (!$user == null && Hash::check($request->password, $user->password)) {
            if ($user->approval && $user->privilege) {
                if (strtolower($user->designation->designation) == 'client') {
                    Session::put('LoggedIn', true);
                    Session::put('User', $user->id);
                    Session::put('Type', $user->designation->designation);
                    Session::put('BaseColor', $user->c_user->client_branch->client->color);
                    return redirect('/client-profile/' . $user->c_user->client_branch->id . '/brands');
                }
                else {
//                    return $user;
                    Session::put('LoggedIn', true);
                    Session::put('User', $user->id);
                    Session::put('Type', $user->designation->designation);
                    Session::put('ip', $request->ip());
                    return redirect('/admin');
                }
            } else {
                $error = 'You are not authorised yet...!';
                return view('welcome', compact('error'));
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
        Session::forget('success');
        Session::flush();
        Session::put('LoggedIn', false);
        return redirect('/');
    }
}
