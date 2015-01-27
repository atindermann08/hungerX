@extends('layouts.default')


@section('container')
    <div class="row">
        @foreach($cart as $item)
        {{{$item->name}}}<br>
        {{{$item->qty}}}<br>
        {{{$item->price}}}<br>
        {{{$item->subtotal}}}<br>
        
        @endforeach        
        <a href='route("restaurant.show")' class='btn btn-warning'>Back to Restaurant</a>
    </div>
@stop