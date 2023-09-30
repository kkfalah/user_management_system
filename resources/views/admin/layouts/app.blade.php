<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ config('app.name', 'UMS') }}</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('backend-assets/plugins/fontawesome-free/css/all.min.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('backend-assets/css/adminlte.min.css') }}">
		<!-- Dropzone -->
		<link rel="stylesheet" href="{{ asset('backend-assets/plugins/dropzone/min/dropzone.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend-assets/css/custom.css') }}">
		<!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			@include('admin.layouts.partials.navbar')
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			@include('admin.layouts.partials.sidebar')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				@yield('content')
			</div>
			<!-- /.content-wrapper -->
            <!-- Footer -->
			@include('admin.layouts.partials.footer')			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{ asset('backend-assets/plugins/jquery/jquery.min.js') }}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('backend-assets/js/adminlte.min.js') }}"></script>	
		<!-- Dropzone -->
		<script src="{{ asset('backend-assets/plugins/dropzone/min/dropzone.min.js') }}"></script>

		<script type="text/javascript">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>
		@yield('customJS')	
	</body>
</html>