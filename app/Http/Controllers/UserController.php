<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('sampath/brands');
    }

    public function getSignin(){
        return view('welcome');
    }
    public function postSignin(Request $request)
{
//    return $request->all();
//        $this->validate($request, [
//            'email' => 'email|required',
//            'password' => 'required|min:4'
//            ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('sampath/brands');
        }
        return redirect()->back();
    }

}
