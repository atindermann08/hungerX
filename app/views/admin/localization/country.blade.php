@extends('admin.layouts.default')

@section('container')

<div class="row">
  <div class="col-lg-12">
    <h2>Countries</h2>
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

    {{ Form::open(array('url' => route('admin.countries.store'), 'class' => 'form-inline')) }}
      {{ Form::label('name') }}
      {{ Form::text('name', null, array("class" => "form-control")) }}
    {{ Form::submit('Add Country', array('class' => 'form-control btn btn-primary')) }}
    {{ Form::close() }}
    <hr>
    <ul>
      @foreach($countries as $country)
        <li>
           {{ Form::open(
                  array(
                    'method' => 'DELETE',
                    'url' => route('admin.countries.destroy', $country->id),
                    'class' => 'form-inline'))}}
             {{ $country->name }}
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
