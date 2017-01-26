@extends('admin.layouts.dashboard')
@section('page_heading','Agent A Assign ')
@section('section')
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-md-5">Username</div>
            <div class="col-md-7"><label>Lakmal</label></div>
        </div>
        <div class="form-group row">
            <div class="col-md-5">Full Name</div>
            <div class="col-md-7"><label>Mahendra Lakmal</label></div>
        </div>
        <div class="form-group row">
            <div class="col-md-5">Designation</div>
            <div class="col-md-7"><label>CTO</label></div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Agent Assign Clents</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Client</h5></td>
                        <td><h5>Address</h5></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>COMMERCIAL BANK</td>
                        <td>Commercial Bank of Ceylon PLC, Commercial House, No 21 , Sir Razik Fareed Mawatha, P.O. Box 856 Colombo 01, Sri Lanka.</td>
                    </tr>
                    <tr>
                        <td>SEYLAN BANK</td>
                        <td>Seylan Towers, No 90 , Galle Road, Colombo 03, Sri Lanka.</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop