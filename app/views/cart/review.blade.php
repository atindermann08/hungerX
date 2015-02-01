@extends('layouts.default')

@section('container')
	<div class='container'>
		<div class="row">
			<h3 class='page-heading'>
				Review Your Order Details
			</h3>
			<div class="col-md-12">
				{{ Form::open([
				'route' => ["cart.checkout", $restaurant->id]
				]) }}
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
					  <div class="panel panel-success">
							<div class="panel-heading" role="tab" id="headingTwo">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#RestaurantDetails" aria-expanded="false" aria-controls="RestaurantDetails">
									<h4 class="panel-title  btn-lg">
										1. Restaurant Details
									</h4>
								</a>
							</div>
							<div id="RestaurantDetails" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							  <div class="panel-body">
								<div class="media">
								  <div class="media-left">
									<img class="media-object" src="{{asset('assets/img/restaurants/test.jpg')}}" alt="{{$restaurant->name}}" height='100px'>
								  </div>
								  <div class="media-body">
									<h4 class="media-heading">{{$restaurant->name}}</h4>
									<ul class='list-unstyled'>
									  <li>Minimum Order: &#8377; {{$restaurant->min_order}}</li>
									  <li>Delivery Time: {{$restaurant->delivery_time}} min</li>
									</ul>
								  </div>
								  <div class="media-body">
								  	<div class="radio">
									  <label>
										<input type="radio" name="pickup" id="pickup" value="0" checked>
										  <b>Deliver to My Address.</b>
									  </label>
									</div>
									<div class="radio">
									  <label>
										<input type="radio" name="pickup" id="pickup" value="1">
										  <b>I will pickup my order from</b>
										<h4>{{ $restaurant->name }}</h4>
										<p>
											{{ $restaurant->area->name}}, {{ $restaurant->area->city->name}}
											{{ $restaurant->area->city->state->name}} ,
											{{ $restaurant->area->city->state->country->name}}
									  	</p>
									  </label>
									</div>
								  </div>
								</div>
							  </div>
							</div>
					  </div>
					  <div class="panel panel-success">
							<div class="panel-heading" role="tab" id="headingTwo">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#OrderSummary" aria-expanded="false" aria-controls="OrderSummary">
								  <h4 class="panel-title btn-lg">
									  2. Order Summary
								  </h4>
								</a>
							</div>
							<div id="OrderSummary" class="list-group panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
							  <div class="panel-body">
									 <ul>{{-- add functionality to add remove update items  --}}
											@foreach($cart as $item)
												<li class='list-group-item btn-lg'>
													<div class="navbar-right">
														<b>&#8377; {{$item->price}}  	</b>
													</div>
													<b>{{$item->name}} </b>x {{$item->qty}}
										 		</li>
											@endforeach
									 </ul>
									 <div class='media-body'></div>
									 <div class='media-right'>
										<a  class='btn btn-info'
											data-toggle="collapse"
											data-parent="#accordion"
											href="#Address"
											aria-expanded="true"
											aria-controls="Address">
												Continue</a>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<div class='media-body'>
									<h4>Order Total : <strong>&#8377; {{ $total }}</strong></h4>
								</div>
							</div>
						</div>
					  <div class="panel panel-success">
							<div class="panel-heading" role="tab" id="headingOne">
								<a data-toggle="collapse" data-parent="#accordion" href="#Address" aria-expanded="true" aria-controls="Address">
								  <h4 class="panel-title btn-lg">
									  3. Address
								  </h4>
								</a>
							</div>
							<div id="Address" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
							  <div class="panel-body">
									@foreach ($addresses as $address)
										<div class="col-sm-3">
											<div class="panel panel-success">
												<div class="panel-heading">
													<h3 class="panel-title">{{ $address->name }}</h3>
												</div>
												<div class="panel-body">
													<h4>{{ Confide::user()->firstname }} {{ Confide::user()->lastname }}</h4>
													House no. {{ $address->house_no }},
													{{ $address->area->name }},
													{{ $address->area->city->name }},
													{{ $address->area->city->state->name }},
													{{ $address->area->city->state->country->name }},
													{{ $address->pin_code }}<br>
													@if($address->landmark)
														Landmark:
													@endif
														{{ $address->landmark }}
													<hr>
													<a class='btn btn-warning btn-block'
														href="{{route('customer.address.edit',$address->id)}}">
															Edit
													</a>
													<div class="radio">
													  <label>
														<input
															type="radio"
															name="address"
															id="address"
															value="{{ $address->id }}"
															@if($defaultAddress &&
																$address->id == $defaultAddress->id )
																checked
															@endif>
														Select for Delivery
													  </label>
													</div>
												  </div>
												</div>
										</div>
									@endforeach
									<hr>
							  </div>
								<div class='panel-footer'>
									<div class="media">
										<div class='media-body'>
											<a
												class='btn btn-warning'
												href='{{route("customer.address.add")}}'>Add New Address</a>
										</div>
										<div class='media-right'>
											{{ Form::submit('Checkout', ['class' => "btn btn-success btn-block" ]) }}
									</div>
								</div>
							</div>
					  </div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
 	</div>
@stop
