<div id="cd-cart" class="speed-in">
		<h2 class='glyphicon glyphicon-cutlery'> Your Order</h2>
		<ul class="cd-cart-items">
            @if(!isset($cart) || !count($cart))
                <li>
                 	<p>
                 		<br>
                  		Your Order is empty...
						<br>
               		</p>
                </li>
            @else
                @foreach($cart as $item)
                    <li>
                        <span class="cd-qty">{{ $item->qty }}x</span> {{ $item->name }}
                        <div class="cd-price">&#8377; {{ $item->subtotal }}</div>
                        {{ Form::open(['url' => route('cart.remove')]) }}
                            {{ Form::hidden('rowid', $item->rowid) }}
                            {{ Form::hidden('restaurant_id', $restaurant->id) }}
                            <button type='submit'  class="btn cd-item-remove">
                                <i class='glyphicon glyphicon-trash'></i>
                            </button>
                        {{ Form::close() }}
                    </li>
                @endforeach
            @endif
		</ul> <!-- cd-cart-items -->

		<div class="cd-cart-total">
			<p>Total <span>&#8377; {{ $total }}</span></p>
		</div> <!-- cd-cart-total -->

		<a href="#0" class="checkout-btn 
			@if( $total < $restaurant->min_order )
				btn btn-succcess-o disabled"> Minimum Order is &#8377; {{ $restaurant->min_order }}</a>
			@else
				">Proceed</a>
			@endif
		<p class="cd-go-to-cart">
			<a href="{{route('cart.clear',$restaurant->id)}}" 
				class='btn btn-danger-o btn-sm @if(!count($cart)) disabled @endif'>
					Clear Cart
			</a>
		</p>
	</div> 