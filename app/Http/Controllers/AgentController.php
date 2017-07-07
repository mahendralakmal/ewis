<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientsBranch;
use App\Clientuser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgentController extends Controller
{
    public function index(ClientsBranch $id)
    {
        if(Session::get('User') ==1)
            $users = User::all();
        else
            $users = User::find(Session::get('User'));
        return view('/admin/clients/agent-assign', compact('users', 'id'));
    }

    public function store(Request $request)
    {
        $cuser = new Clientuser();

        $cuser->created_user = $request->created_user;
        $cuser->client_id = $request->client_id;
        $cuser->user_id = $request->user_id;
        $cuser->cp_name = $request->cp_name;
        $cuser->cp_designation = $request->cp_designation;
        $cuser->clients_branch_id = $request->branch_id;
        $cuser->cp_telephone = $request->cp_telephone;
        $cuser->cp_email = $request->cp_email;
        $cuser->save();
        return redirect('/admin/manage-clients/create-clientuser');
    }

    public function update(Request $request)
    {
//        return $request->all();
        $cuser = Clientuser::find($request->id);

        $cuser->update([
            'created_user' => $request->created_user,
            'client_id' => $request->client_id,
            'user_id' => $request->user_id,
            'cp_name' => $request->cp_name,
            'cp_designation' => $request->cp_designation,
            'clients_branch_id' => $request->branch_id,
            'cp_telephone' => $request->cp_telephone,
            'cp_email' => $request->cp_email
        ]);
        return redirect('/admin/manage-clients/create-clientuser');
    }

    public function check_assignment(User $id)
    {
        $clients = ClientsBranch::where('agent_id', $id->id)->get();
        return view('/admin/clients/check-assignments', compact('id', 'clients'));
    }

    public function assign(ClientsBranch $branch, User $agent)
    {
        $branch->update(['agent_id' => $agent->id]);
        return redirect('/admin/manage-clients/agent-assign/' . $branch->id);
    }

    public function remove(ClientsBranch $branch, User $agent)
    {
        $branch->update(['agent_id' => null]);
        return redirect('/admin/manage-clients/agent-assign/' . $branch->id);
    }

    public function client_user(User $user)
    {
        $cuser = Clientuser::where('user_id', $user->id)->first();
        if (!$cuser == null) {
            $id = $cuser;
        } else {
            $id = null;
        }

        $ses = User::find(session('User'));
//        if ($ses->id == 1)
            $clients = Client::where('approval', 1)->get();
//        else
//            $clients = ClientsBranch::where('agent_id', $ses->id)->get();

        return view('/admin/clients/client-users', compact('user', 'clients', 'id'));
    }

    public function client_user_activate(User $user)
    {
        $user->update(['approval' => 1]);
        return back();
    }

    public function client_user_deactivate(User $user)
    {
        $user->update(['approval' => 0]);
        return back();
    }
}
