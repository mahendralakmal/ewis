<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index(User $id){
        $ajents = User::where([['designation_id','!=',4],['approval',1]])->get();
        return view('/admin/clients/agent-assign', compact('ajents', 'id'));
    }

    public function assign(User $user, User $agent, Client $id){
        $id->update(['agent_id' => $agent->id]);
        return redirect('/admin/manage-clients/agent-assign/'.$user->id);
    }

    public function remove(User $user, User $agent, Client $id){
        $id->update(['agent_id' => null]);
        return redirect('/admin/manage-clients/agent-assign/'.$user->id);
    }
}
