@extends('layouts.default')

@section('container')
<div class='container'>

    <div class="row">
            <div class="col-sm-6 col-md-offset-3">
            	<h3>
					Your Order Details 
			  	</h3>
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Order number: {{ $order->id }}</h3>
					</div>
					 <div class="panel-body">
					 	<div class='col-md-12'>
							<div class="media">
							  <div class="media-body">
								<h3 class="media-heading">Restaurant: {{ $order->restaurant->name }}</h3>
								  <ul>
								  	<li>{{ $order->pickup?'Pickup':'To be delivered ' }}
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
							  <div class="media-right">
								  <img class='img-rounded' 
								  	src="{{asset('assets/img/restaurants/test.jpg')}}" 
								  	alt="{{$order->restaurant->name}}" width='96' height='96' />
							  </div>
							</div><hr>
						 </div>
						 <div class='col-md-12'>
						  	<div class="media">
							  	<div class="media-body">
							 	<h3 class="media-heading"> Address: {{ $order->address->name }}</h3>
						 		<h4>{{ Confide::user()->firstname }} {{ Confide::user()->lastname }}</h4>

								House no. {{ $order->address->house_no }}, 
								{{ $order->address->area->name }}, 
								{{ $order->address->area->city->name }}, 
								{{ $order->address->area->city->state->name }}, 
								{{ $order->address->area->city->state->country->name }}, 
								{{ $order->address->pin_code }}<br> 
								@if($order->address->landmark)
									Landmark: 
								@endif
									{{ $order->address->landmark }}
								</div>
							 </div><hr>
						 </div>
						 <div class='col-md-12'>
						 <h3>Food Items</h3>
						 <ul><li>
							 <div class="navbar-right"><b></b></div><hr></li>
						 	@foreach($order->items as $item)
						 		<li>
                               		<div class="navbar-right">                        
                                		<b>&#8377; {{$item->price}}</b>
									</div>
									<h5>{{$item->name}} x {{$item->quantity}} </h5>
									<hr>
							 	</li>
						 	@endforeach
						 </ul>
						 </div>
					</div>
					<div class="panel-footer">
						<div class='media-body'>Date: {{$order->created_at}}</div>
						<div class='media-body'>
							Order Total : <strong>&#8377; {{ $order->total }}</strong>
						</div>
					</div>
				</div>
            </div>
    </div>
    </div></div>
@stop

