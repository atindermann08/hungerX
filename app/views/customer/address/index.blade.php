@extends('layouts.default')

@section('container')
<div class='container'>
  <div class="row">
    @if(count($addresses))
      <h3>
        Update or Select default Address from {{count($addresses)}} Addresses.
        <small><i class="location arrow icon"></i><a href='{{route("customer.address.add")}}'>Add New Address</a></small>
      </h3>
    @else
      <h3>
        You dont have any Address saved. 
        <small><i class="location arrow icon"></i><a href='{{route("customer.address.add")}}'>Add New Address</a></small>
      </h3>
    @endif


    <div class="row">
        @foreach ($addresses as $address)
            <div class="col-sm-4 col-md-3">
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
							<a class='btn btn-success btn-block @if($address->default) disabled @endif' 
								href="{{route('customer.address.default', $address->id)}}">
									Set Default
							</a>
						 	
					  </div>
					</div>
                </a>
            </div>
        @endforeach
    </div>
    </div></div>
@stop

