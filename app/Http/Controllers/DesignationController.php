<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $id="";
        $designations = Designation::all();
        return view('/admin/users/manage-user-designation', compact('designations', 'id'));
    }

    public function edit(Designation $id)
    {
        $designations = Designation::all();
        return view('/admin/users/manage-user-designation', compact('designations', 'id'));
    }

    public function store(Request $request)
    {
        Designation::create($request->all());
        return back();
    }

    public function update(Request $request)
    {
        $desig = Designation::find($request->id);
        $desig->update([ 'designation'=>$request->designation ]);
        return redirect('/admin/users/manage-user-designations');
    }
}
