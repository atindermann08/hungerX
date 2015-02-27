<div class="panel panel-success">
	<div class="panel-heading"> <i class='glyphicon glyphicon-cutlery'></i> Your Order</div>
	<div class="panel-body">
			@if(!isset($cart) || !count($cart))
				<p>
					<br>
					Your Order is empty...
					<br>
				</p>
			@else
			<table>
				@foreach($cart as $item)
					<tr>
						<td>
							<span class=""> {{ $item->qty }} x  </span>
						</td>
						<td class='col-md-9'> <b>  {{ $item->name }}  </b> </td>
						<td>
							<div class=""> &#8377; {{ $item->subtotal }}</div>
						</td>
						<td>
							{{ Form::open(['url' => route('cart.remove')]) }}
							{{ Form::hidden('rowid', $item->rowid) }}
							{{ Form::hidden('restaurant_id', $restaurant->id) }}
							<button type='submit'  class="btn btn-link">
								x
							</button>
							{{ Form::close() }}
						</td>
					</tr>
					@endforeach
				</table>
			@endif
			<br>
		<div class="">
			<p>Total <span class="pull-right">&#8377; {{ $total }}</span></p>
		</div> <!-- cd-cart-total -->

		<a href="{{ route('cart.review', $restaurant->id) }}" class="btn btn-success btn-block
			@if( $total < $restaurant->min_order )
			 disabled"> Minimum Order is &#8377; {{ $restaurant->min_order }}</a>
			@else
			">Proceed</a>
			@endif
			<p class="">
				<a href="{{route('cart.clear',$restaurant->id)}}"
					class='btn btn-block btn-danger-o btn-sm @if(!count($cart)) disabled @endif'>
					Clear Cart
				</a>
			</p>
	</div>
</div>
