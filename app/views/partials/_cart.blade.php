<div id="cd-cart" class="speed-in">
		<h2 class='glyphicon glyphicon-cutlery'> Your Order</h2>
		<ul class="cd-cart-items">
            @if(!isset($cart) || !count($cart))
                <li>
                  Your Order is empty...
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

		<a href="#0" class="checkout-btn">Checkout</a>
		<p class="cd-go-to-cart"><a href="{{route('cart.clear',$restaurant->id)}}">Clear Cart</a></p>
	</div>