<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>{{ config('app.admin', 'Laravel') }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="shortcut icon" href="{{ elixir('img/favicon.ico') }}">
	<link rel="stylesheet" href="{{ elixir('css/admin_app.css') }}" />
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/css/sb-admin-2.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/css/metisMenu.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/css/timeline.css") }}" />
	<link rel="stylesheet" href="{{ asset("assets/css/font-awesome.css") }}" />
</head>
<body>
	@yield('body')
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

	<script>

		$("#categories").validate({
			rules:{
				title: "required",
				brand_id: "required",
				image: "required"
			}
		});

		$("#brands").validate({
			rules:{
				title: "required",
				image: "required"
			}
		});
		$( "#clientProfile" ).validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
				address: {
					required: true
				},
				telephone: {
					required: true
				},
				logo: {
					required: true
				},
				color: {
					required: true
				},
				cp_name: {
					required: true
				},
				cp_designation: {
					required: true
				},
				cp_branch: {
					required: true
				},
				cp_telephone: {
					required: true
				},
				cp_email: {
					required: true
				}
			}
		});
		$( "#userCreate" ).validate({
			rules: {
				email: {
					required: true,
					email: true
				},
				password: {
					required:true,
					minlength:6,
					maxlength:12
				},
				cpassword: {
					equalTo: "#password"
				},
				name: "required",
				designation: {
					required: true,
				},
				nic_pass: {
					required:true,
					maxlength:12,
					minlength:7
				},
			}
		});
	</script>

	<script src="http://demo.startlaravel.com/sb-admin-laravel/assets/scripts/frontend.js" type="text/javascript"></script>

	<script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>

</body>
</html>