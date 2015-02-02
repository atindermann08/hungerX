<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>SB Admin - Bootstrap Admin Template</title>
		@section('styles')
			<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
			<link rel="stylesheet" href="{{asset('admin/css/sb-admin.css')}}">
			<link rel="stylesheet" href="{{asset('admin/css/plugins/morris.css')}}">
			<link rel="stylesheet" href="{{asset('admin/font-awesome/css/font-awesome.min.css')}}">
		@show
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		@include('admin.partials._header')
		<div id="wrapper">
			<div id="page-wrapper">
				<div class="container-fluid">
					@yield('container')
				</div><!-- /.container-fluid -->
			</div><!-- /#page-wrapper -->
		</div><!-- /#wrapper -->       
		@section('scripts')
			<script src="{{asset('admin/js/jquery.js')}}"></script>
			<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
			<script src="{{asset('admin/js/plugins/morris/raphael.min.js')}}"></script>
			<script src="{{asset('admin/js/plugins/morris/morris.min.js')}}"></script>
			<script src="{{asset('admin/js/plugins/morris/morris-data.js')}}"></script>
		@show
	</body>
</html>

