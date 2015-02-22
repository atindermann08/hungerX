@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">Categories</h1>

    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="active">Categories</li>
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

    {{ Form::open(array('url' => route('admin.categories.store'), 'class' => 'form-inline')) }}
    {{ Form::label('name') }}
    {{ Form::text('name', null, array("class" => "form-control")) }}
    {{ Form::submit('Add Category', array('class' => 'form-control btn btn-primary')) }}
    {{ Form::close() }}
    <hr>
    <ul>
      @foreach($categories as $category)
      <li>
        {{ Form::open(
          array(
          'method' => 'DELETE',
          'url' => route('admin.categories.destroy', $category->id),
          'class' => 'form-inline'))}}
          {{ $category->name }}
          {{ Form::submit('Delete', array('class' => 'btn btn-link'))}}
          {{ Form::close()}}
        </li>
        @endforeach
      </ul>
      <hr>


      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


  @stop
