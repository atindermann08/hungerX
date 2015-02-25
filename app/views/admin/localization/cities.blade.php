@extends('admin.layouts.default')

@section('container')

    <h1 class="page-header">Cities</h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="active">Cities</li>
    </ol>
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

      <table class="table table-striped table-hover">
        <tr>
          <th>City</th>
          <th>State</th>
          <th>Country</th>
          <th>Action</th>
        </tr>
        <tr>
          {{ Form::open([
            'url' => route('admin.cities.store'),
            'method' => 'POST'
            ])}}
            <td>
              {{ Form::text('name', null, array("class" => "form-control")) }}
            </td>
            <td> {{ Form::select('state_id', $states, null, ['class' => "form-control" ]) }}  </td>
            <td> {{ Form::select('country_id', $countries, null, ['class' => "form-control", 'disabled' => 'disabled' ]) }} </td>
            <td> {{ Form::submit('Add City', ['class' => 'btn btn-primary btn-block']) }}</td>
            {{ Form::close() }}
          </tr>
          @foreach($cities as $city)
          <tr>
            <td>
              {{$city->name}}
            </td>
            <td>
              {{$city->state->name}}
            </td>
            <td>
              {{$city->state->country->name}}
            </td>
            <td>
              {{ Form::open(
                array(
                'method' => 'DELETE',
                'url' => route('admin.cities.destroy',$city->id),
                'class' => 'form-inline'))}}
                {{ Form::submit('Delete City', array('class' => 'btn btn-link'))}}
                {{ Form::close()}}
              </td>
            </tr>
            @endforeach
          </table>

      <hr>
@stop
