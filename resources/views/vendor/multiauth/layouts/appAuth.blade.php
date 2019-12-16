
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title> @yield('title') {{config('app.name', 'SYGEP')}} </title>


	<!-- Favicon-->
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<!-- Bootstrap Core Css -->
	<link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

	<!-- Waves Effect Css -->
	<link href="{{ asset('backend/assets/plugins/node-waves/waves.css') }}" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="{{ asset('backend/assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />

	<!-- Morris Chart Css-->
	<link href="{{ asset('backend/assets/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

	<!-- Custom Css -->
	<link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="{{ asset('backend/assets/css/themes/all-themes.css') }}" rel="stylesheet" />
	<link href="{{ asset('mdwf/css/materialdesignicons.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />

	@stack('css')
</head>

<body class="login-page bg-teal" >
	<div class="login-box">
		<div class="logo">
			<a href="javascript:void(0);"><b>SYGEP GUINEE<span class="small"></span></b></a>
			<small>UN SYSTEME POUR UNE GESTION EFFICACE!!!</small>
		</div>
		<div class="card">
			<div class="body">


				@yield('content')

				<!-- Jquery Core Js -->
				<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

				<!-- Bootstrap Core Js -->
				<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.js') }}"></script>

				<!-- Select Plugin Js -->
     {{-- <script src="{{ asset('backend/assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
     --}}
     <!-- Slimscroll Plugin Js -->
     <script src="{{ asset('backend/assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

     <!-- Waves Effect Plugin Js -->
     <script src="{{ asset('backend/assets/plugins/node-waves/waves.js') }}"></script>

     <!-- Custom Js -->
     <script src="{{ asset('backend/assets/js/admin.js') }}"></script>
     <script src="{{ asset('js/toastr.min.js') }}"></script>

     {!! Toastr::message() !!}

     <script>

     	@if ($errors->any())

     	@foreach ($errors->all() as $error)

     	toastr.error('{{ $error }}', 'Erreure',{

     		closeButton:true,
     		progressBar:true,
     	});

     	@endforeach
     	@endif

     </script>


     @stack('scripts')

 </body>
 </html>
