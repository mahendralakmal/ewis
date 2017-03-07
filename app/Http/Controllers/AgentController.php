<?php

namespace App\Http\Controllers;

use App\Client;
use App\Clientuser;
use App\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function store(Request $request)
    {
        $cuser = new Clientuser();

        $cuser->created_user = $request->created_user;
        $cuser->client_id = $request->client_id;
        $cuser->user_id = $request->user_id;
        $cuser->cp_name = $request->cp_name;
        $cuser->cp_designation = $request->cp_designation;
        $cuser->cp_branch = $request->cp_branch;
        $cuser->cp_telephone = $request->cp_telephone;
        $cuser->cp_email = $request->cp_email;
        $cuser->save();
        return redirect('/admin/users/create-users');
    }

    public function update(Request $request)
    {
        $cuser = Clientuser::find($request->id);

        $cuser->update([
            'created_user' => $request->created_user,
            'client_id' => $request->client_id,
            'user_id' => $request->user_id,
            'cp_name' => $request->cp_name,
            'cp_designation' => $request->cp_designation,
            'cp_branch' => $request->cp_branch,
            'cp_telephone' => $request->cp_telephone,
            'cp_email' => $request->cp_email
        ]);
        return redirect('/admin/users/create-users');
    }

    public function index(User $id)
    {
        $users = User::all();
        return view('/admin/clients/agent-assign', compact('users', 'id'));
    }

    public function check_assignment(User $id)
    {
        $clients = Client::where('agent_id', $id->id)->get();
        return view('/admin/clients/check-assignments', compact('id', 'clients'));
    }

    public function assign(User $user, User $agent, Client $id)
    {
        $id->update(['agent_id' => $agent->id]);
        return redirect('/admin/manage-clients/agent-assign/' . $user->id);
    }

    public function remove(User $user, User $agent, Client $id)
    {
        $id->update(['agent_id' => null]);
        return redirect('/admin/manage-clients/agent-assign/' . $user->id);
    }

    public function client_user(User $user)
    {
        $cuser = Clientuser::where('user_id', $user->id)->first();
        if (!$cuser == null) {
            $id = $cuser;
        } else {
            $id = null;
        }
        $clients = Client::where('approval', 1)->get();
        return view('/admin/clients/client-users', compact('user', 'clients', 'id'));
    }

    public function client_user_activate(User $user){
        $user->update(['approval'=>1]);
        return back();
    }

    public function client_user_deactivate(User $user){
        $user->update(['approval'=>0]);
        return back();
    }
}
