@extends('admin.layouts.default')

@section('container')

<div class="row">
  <div class="col-lg-12">
    <h2>Restaurants</h2>
    <hr>

    @if($errors->has())
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Warning!</strong> Following errors occured
      <ul>
        @foreach($errors->all() as $error)
        <li> {{ $error }}  </li>
        @endforeach
      </ul>
    </div>
    @endif
    <a href='{{route("admin.restaurants.create")}}' class="btn btn-primary">Add New Restaurant</a>
      <hr>
      <ul>
        @foreach($restaurants as $restaurant)
        <li>
          {{ Form::open(
            array(
            'method' => 'DELETE',
            'url' => route('admin.restaurants.destroy', $restaurant->id),
            'class' => 'form-inline'))}}
            {{ $restaurant->name }}, {{ $restaurant->area->name }}
            {{ Form::submit('Delete', array('class' => 'btn btn-link'))}}
            {{ Form::close()}}
          </li>
          @endforeach
        </ul>
        <hr>


        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
    </div>
    @stop
