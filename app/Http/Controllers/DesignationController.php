<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $this->validate(request(),
            ['designation' => 'required|unique:designations|max:100'],
            ['designation.unique' => 'Designation Already Exists....!!!, Please verify and enter the details again.']
        );

        Designation::create($request->all());
        Session::flash('success', 'Designation successfully added...!');
        return back();
    }

    public function update(Request $request)
    {
        $this->validate(request(), [
            'designation' => 'required|unique:designations|max:100',
        ]);
        $desig = Designation::find($request->id);
        $desig->update([ 'designation'=>$request->designation ]);
        Session::flash('success', 'Designation successfully updated...!');
        return redirect('/admin/users/manage-user-designations');
    }
}
