<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Hunger Expert - Its food time!</title>

  {{-- scripts section --}}
  @section('scripts')
    <script src="{{asset('vendor/js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('vendor/js/semantic.min.js')}}"></script>
  @show

  {{-- styles section --}}
  @section('styles')
    <link rel="stylesheet" href="{{asset('vendor/css/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/heapp.css')}}">
  @show

</head>

<body>

  {{-- include header partial --}}
  @include('partials.header')

  <div class="ui grid">
    <div class="column">
      @yield('container')
    </div>
  </div>

  {{-- include footer partial --}}
  @include('partials.footer')

</body>
</html>
