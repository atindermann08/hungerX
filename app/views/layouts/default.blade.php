<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Hunger Expert - Its food time!</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- scripts section --}}
  @section('scripts')
    <script src="{{asset('vendor/js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    {{--<script src="{{asset('vendor/js/semantic.min.js')}}"></script>--}}
  @show

  {{-- styles section --}}
  @section('styles')
    {{--<link rel="stylesheet" href="{{asset('vendor/css/semantic.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/heapp.css')}}">
  @show

</head>

<body>

  {{-- include header partial --}}
  @include('partials._header')

  <div class="container-fliud">
      @yield('container')
  </div>

  {{-- include footer partial --}}
    {{--@include('partials._footer')--}}

</body>
</html>
