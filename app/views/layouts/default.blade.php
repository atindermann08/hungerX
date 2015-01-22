<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Hunger Expert - Its food time!</title>


  {{-- scripts section --}}
  @section('scripts')
    <script src="vendor/scripts/jquery-2.1.1.min.js"></script>
    <script src="vendor/scripts/semantic.min.js"></script>
  @show

  {{-- styles section --}}
  @section('styles')
    <link rel="stylesheet" href="vendor/style/semantic.min.css">
    <link rel="stylesheet" href="assets/css/heapp.css">
  @show

</head>

<body>

  {{-- include header partial --}}

  <div class="ui grid">
    <div class="column">
      @yield('container')
    </div>
  </div>

  {{-- include footer partial --}}

</body>
</html>
