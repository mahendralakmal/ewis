<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        $profile = UserProfile::where('user_id', '5')->first();
//        return $profile;
        return view('sampath.edit-user', compact('profile'));
    }
}
