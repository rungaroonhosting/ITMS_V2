<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','ITMS')</title>

  {{-- ใช้ app.css/app.js เหมือนกัน --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  @stack('styles')
</head>
<body class="theme-itms" style="min-height:100vh; display:grid; place-items:center; padding:1rem;">
  @yield('content')
  @stack('scripts')
</body>
</html>
