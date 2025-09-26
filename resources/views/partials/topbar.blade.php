<header style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
  <div class="breadcrumbs">@yield('breadcrumbs')</div>
  <div>{{ auth()->user()->name ?? 'Guest' }}</div>
</header>
