<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AjentController extends Controller
{
    public function index(){
        $ajents = User::where([['designation_id','!=',4],['approval',1]])->get();
        return view('/admin/clients/agent-assign', compact('ajents'));
    }
}
