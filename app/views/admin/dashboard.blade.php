@extends('admin.layouts.default')

@section('container')
	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Dashboard <small>Statistics Overview</small>
			</h1>
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i> Dashboard
				</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->
{{--
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="fa fa-info-circle"></i>
			</div>
		</div>
	</div> put alerts notifications here --}}

	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-cutlery fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{ $restaurants }}</div>
							<div>Restaurants</div>
						</div>
					</div>
				</div>
				<a href="{{ route('admin.restaurants.index')}}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-users fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{$users}}</div>
							<div>Accounts</div>
						</div>
					</div>
				</div>
				<a href="{{ route('admin.accounts.index')}}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-yellow">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-shopping-cart fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{$orders}}</div>
							<div>Orders</div>
						</div>
					</div>
				</div>
				<a href="{{ route('admin.orders.index')}}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-globe fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">{{$cities}}</div>
							<div>Cities</div>
						</div>
					</div>
				</div>
				<a href="{{ route('admin.cities.index')}}">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /.row -->
	@stop
