<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'EWIS Peripherals')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}"/>
    <!-- Styles -->
    <style>
        .error {
            color: #ff001f;
        }
    </style>

</head>
<body>
<div class="container welcome">
    <div class="col-md-5 col-md-offset-4">
        <form method="post" action="/signup/go" role="form" id="signup" class="form-horizontal">
            {{ csrf_field() }}
            <div class="user-login">
                <div class="">
                    <div class="col-md-5"><h4>User Signup</h4></div>
                    <div class="col-md-7"><img src="{{ elixir('img/ewis-logo.png') }}"></div>
                </div>
                <div>&nbsp;
                    <hr>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Username</label></div>
                    <div class="col-md-8"><input type="text" name="email" id="email" class="form-control"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Password</label></div>
                    <div class="col-md-8"><input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Confirm Password</label></div>
                    <div class="col-md-8"><input type="password" name="cpassword" id="cpassword" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-4"><label>Name</label></div>
                    <div class="col-md-8"><input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>NIC/ Passport</label></div>
                    <div class="col-md-8"><input type="text" name="nic_pass" id="nic_pass" class="form-control"
                                                 maxlength="12">
                    </div>
                </div>
                <input type="hidden" id="designation_id" name="designation_id" value="1">
                <input type="hidden" id="approval" name="approval" value="1">
                <input type="hidden" id="user_id" name="user_id" value="1">
                <div>&nbsp;
                    <hr>
                </div>
                <button type="submit" class="btn btn-primary">Signup</button>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script>
    $("#signup").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                passwordcheck: true,
                minlength: 6,
                maxlength: 12
            },
            cpassword: {
                equalTo: "#password"
            },
            name: "required",
            designation: {
                required: true,
            },
            nic_pass: {
                required: true,
                maxlength: 12,
                minlength: 7
            },
        },
        messages:{
            password:{
                passwordcheck:"Password must contain a special character, a Capital letter, a simple letter and a numeric.s",
            }
        }
    });

    $.validator.addMethod("passwordcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
    });
</script>
</body>
</html>
