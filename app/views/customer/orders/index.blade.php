@extends('layouts.default')

@section('container')
<div class='container'>
  <div class="row">
    @if(count($orders))
      <h3>
        Your Orders  
        <small><i class="location arrow icon"></i><a href='{{url("/")}}'>Order Some more!</a></small>
      </h3>
    @else
      <h3>
        You have not placed any orders yet. 
        <small><i class="location arrow icon"></i><a href='{{url("/")}}'>Order Something</a></small>
      </h3>
    @endif


    <div class="row">
        @foreach ($orders as $order)
            <div class="col-sm-6">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Order number: {{ $order->order_number }}</h3>
					</div>
					 <div class="panel-body">
							<div class="media">
							  <div class="media-left">
								  <img class='img-rounded' 
								  	src="{{asset('assets/img/restaurants/test.jpg')}}" 
								  	alt="{{$order->restaurant->name}}" width='96' height='96' />
							  </div>
							  <div class="media-body">
								<h4 class="media-heading">Restaurant: {{ $order->restaurant->name }}</h4>
								  <ul>
									<li>Address: {{$order->address->name}}</li>																	<li>{{ $order->pickup?'Pickup':'To be delivered ' }}
									{{ $order->delivery_later
											?' on '.$order->delivery_date.' at '.$order->delivery_time
											:'as soon as poosible.' }}</li>
									<li>
										Payment<b> {{$order->payment_status?'Completed':'Pending'}}</b>
									</li>
									
									<li>
										Delivery<strong> {{$order->delivery_status}}</strong>			
									</li>
								  </ul>
							  </div>
							</div>
					</div>
					<div class="panel-footer">
						<div class='media-body'>Date: {{$order->created_at}}</div>
						<div class='media-right'>
							<a class='btn btn-success'
								href="{{route('customer.orders.show', $order->id)}}">
									Details
							</a>
						</div>
					</div>
				</div>
            </div>
        @endforeach
    </div>
    </div></div>
@stop

