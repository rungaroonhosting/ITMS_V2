<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','ITMS')</title>

  {{-- เรียกผ่าน app.css และ app.js เท่านั้น --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  @stack('styles')
</head>
<body class="theme-itms">
  <div class="app">
    @include('partials.sidebar')
    <main class="content" style="margin-left:260px; padding:1.25rem 1.5rem;">
      @include('partials.topbar')
      @yield('content')
    </main>
  </div>
  @stack('scripts')
</body>
</html>
