@extends('admin.layouts.default')

@section('container')

<div class="row">
  <div class="col-lg-12">
    <h2>Countries</h2>
    <hr>

    @if($errors->has())
    <div class='alert'>
      <p>Following errors occured</p>
      <ul>
        @foreach($errors->all() as $error)
        <li> {{ $error }}  </li>
        @endforeach
      </ul>
    </div>
    @endif

    {{ Form::open(array('url' => route('admin.countries.store'), 'class' => 'form-inline')) }}
      {{ Form::label('name') }}
      {{ Form::text('name') }}
    {{ Form::submit('Add Country', array('class' => 'btn btn-primary')) }}
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
