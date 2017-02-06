<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        $profile = UserProfile::all();
        return view('sampath.edit-user', compact('profile'));
    }
}
