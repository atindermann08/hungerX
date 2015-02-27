@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">Account</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li><a href="{{ route('admin.accounts.index') }}">Accounts</a></li>
  <li class="active">Accounts Details</li>
</ol>
<hr>
<div class="col-md-12">
  <div class="page-header">
    <div class="media">
      <div class="media-body">
        <h4 class="media-heading">{{$user->firstname}} {{$user->lastname}}</h4>
        <div class="col-md-4">
          <ul class='list-unstyled'>
            <li><b>Mobile:</b>{{$user->mobile}}</li>
            <li><b>Email:</b> {{$user->email}} </li>
            <li><b>Confirmed:</b> @if($user->confirmed) Yes @else No @endif</li>
          </ul>
        </div>
        <div class="col-md-4">
          @if($user->defaultAddress)
            <b>Default Address - {{ $user->defaultAddress->name }}</b>
            <p>
              House no. {{ $user->defaultAddress->house_no }}, {{ $user->defaultAddress->area->name }},
              Landmark- {{ $user->defaultAddress->landmark }},
              {{ $user->defaultAddress->area->city->name }}, {{ $user->defaultAddress->area->city->state->name }}
              {{ $user->defaultAddress->area->city->state->country->name }}
            </p>
          @endif
          </div>
          <div class="col-md-4">
            <a href="{{ route('admin.accounts.edit', $user->id) }}" class="btn btn-primary">Edit Account Details</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <h4 class="col-md-12 text-center glyphicon glyphicon-cutlery">
        Orders
        <a href="{{ route('admin.accounts.orders.edit', $user->id) }}">

        </a>
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
        </tr>
        @foreach($user->orders as $order)
        <tr>
          <td> {{ $order->id}}-{{$order->created_at}} </td>
          <td> {{ $order->restaurant->name }} </td>
          <td> {{ $order->address->name }} </td>
          <td> @if(!$order->pickup) Delivery @else Pickup @endif</td>
          <td> @if($order->payment_status) Paid @else Pending @endif</td>
          <td> {{ $order->payment_type }}</td>
          <td> {{ $order->total }} </td>
        </tr>
        @endforeach
      </table>
    </div>

    <div class="col-md-12">
      <h4 class="col-md-12 text-center glyphicon glyphicon-map-marker">
        Addresses
        <a href="{{ route('admin.accounts.addresses.edit', $user->id)}}">

        </a>
      </h4>
      <table class="table table-striped table-hover">
        <tr>
          <th>Name</th>
          <th>House no</th>
          <th>Area</th>
          <th>City</th>
        </tr>
        @foreach($user->addresses as $address)
        <tr>
          <td>
            {{ $address->name }}
          </td>
          <td>
            {{ $address->house_no }}
          </td>
          <td>
            {{ $address->area->name }}
          </td>
          <td>
            {{ $address->area->city->name }}
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  @stop
