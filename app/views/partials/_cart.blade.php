<div class="ui top attached orange segment">
  <div class='ui orange dividing header'>
    <i class="food icon"></i>
    <div class="content">
      Your Order
    </div>
  </div>
  <div class='ui horizontal divider'>
    {{$restaurant->name}}
  </div>
  @if(!isset($cart) || !count($cart->items))
    <div>
      Your Order is empty...
    </div>
  @else
    {{--<b>
      <div class='ui divided list'>
        @foreach ($cart->items as $item)
        <div class='item'>
          <div class='content'>
            <div class='center aligned header'> {{$item->name}}</div>
            <div class="right floated right aligned">
              {{$item->total}}
              <a><i class='remove icon'></i></a>
            </div>
            <div class='description'>
              <a><i class="add square icon"></i></a>
              <a><i  class='minus square icon'></i></a>
              <input number-only ng-model="item.quantity"  style='width:25px;height:17px;' /><!---->
              x {{$item->price}}
            </div>
          </div>
        </div>
        <div class='hidden divider'></div>
        <div class='item'>
          <div class='right floated right aligned'>{{$cart->subTotal}}</div>
          <div class='header'>Subtotal</div>
          <div class='right floated right aligned'>{{$restaurant->delivery_fee}}</div>
          <div class='header'>Delivery Fee</div>
          <div class='right floated right aligned'>{{$cart->total}}</div>
          <div class='header'>Total</div>
        </div>
      </div>
    </b><br>
    <div @if(($cart->total>$restauran->min_order)&&($cart->subTotal>0)){class='disabled'} class="fluid ui animated fade orange basic button">
      <div class="visible content">
        @if($cart->total >= $restauran->min_order)
          <div>Checkout</div>
        @else
          <div>Min Order {{$restaurant->min_order}}</div>
        @endif
      </div>
      <div class="hidden content">
        Total Order Amount {{$cart->total}}
      </div>
    </div>--}}
  @endif
</div>
