@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">Orders</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li class="active">Orders</li>
</ol>
<hr>
<div class="col-md-12">
  <h4 class="col-md-12 text-center glyphicon glyphicon-cutlery">
    Orders
  </h4>
  <table class="table table-striped table-hover">
    <tr>
      <th>Order no</th>
      <th>Restaurant</th>
      <th>Address</th>
      <th>Delivery/Pickup</th>
      <th>Payment Status</th>
      <th>Payment Type</th>
      <th>Order Total</th>
      <th>Action</th>
    </tr>
    @foreach($orders as $order)
    <tr>
      <td> {{ $order->id}}-{{$order->created_at}} </td>
      <td> {{ $order->restaurant->name }} </td>
      <td> {{ $order->address->name }} </td>
      <td> @if(!$order->pickup) Delivery @else Pickup @endif</td>
      <td> @if($order->payment_status) Paid @else Pending @endif</td>
      <td> {{ $order->payment_type }}</td>
      <td> {{ $order->total }} </td>
      <td> <a href='{{route("admin.orders.show", $order->id)}}' class="btn btn-primary btn-block">Manage<a/></td>
    </tr>
    @endforeach
  </table>
</div>
@stop
