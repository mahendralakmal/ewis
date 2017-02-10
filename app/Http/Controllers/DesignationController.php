<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index(){
        $designations = Designation::all();
        return view('/admin/users/manage-user-designation', compact('designations'));
    }

    public function store(Request $request)
    {
        Designation::create($request->all());
        return back();
    }
}
