<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
    rel="stylesheet">

  {{-- styles  --}}
  <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  {{-- toaster --}}
  <link rel="stylesheet" href="{{ asset('assets/lib/toaster/toastr.min.css') }}">

</head>

<body class="antialiased">

  @include('partials.nav')

  @yield('content')

  <script src="{{ asset('js/app.js')}}"></script>
  {{-- Jquery --}}
  <script src="{{ asset('assets/lib/jquery.min.js') }}"></script>
  {{-- toaster --}}
  <script src="{{ asset('assets/lib/toaster/toastr.min.js') }}">
  </script>


  @stack('scripts')
  <script>
    @if(Session::has('message'))
      toastr.options =
      {
      	"closeButton" : true,
      	"progressBar" : true
      }
      		toastr.{{ session('type') }}("{{ session('message') }}");
      @endif
    
  </script>
</body>

</html>