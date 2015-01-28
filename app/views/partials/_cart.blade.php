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
                        <div class="cd-price">${{ $item->subtotal }}</div>
                        {{ Form::open(['url' => route('cart.remove')]) }}
                            {{ Form::hidden('rowid', $item->rowid) }}
                            <button type='submit'  class="btn cd-item-remove">Remove</button>
                        {{ Form::close() }}
                    </li>
                @endforeach
            @endif
		</ul> <!-- cd-cart-items -->

		<div class="cd-cart-total">
			<p>Total <span>{{ $total }}</span></p>
		</div> <!-- cd-cart-total -->

		<a href="#0" class="checkout-btn">Checkout</a>
		<p class="cd-go-to-cart"><a href="{{route('cart.clear')}}">Clear Cart</a></p>
	</div>