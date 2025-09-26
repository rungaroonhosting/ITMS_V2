@php
  $dashboardUrl = \Illuminate\Support\Facades\Route::has('dashboard') ? route('dashboard') : url('/');
@endphp
<aside style="width:260px; position:fixed; inset:0 auto 0 0; background:#1f2937; color:#fff; padding:1rem;">
  <div style="font-weight:800; letter-spacing:.4px; margin-bottom:1rem;">ITMS</div>
  <nav style="display:grid; gap:.25rem;">
    <a href="{{ $dashboardUrl }}" style="padding:.6rem .8rem; border-radius:10px; color:#fff; display:block;">Dashboard</a>
    <a href="{{ route('employees.index') }}" style="padding:.6rem .8rem; border-radius:10px; color:#fff; display:block;">จัดการพนักงาน</a>
  </nav>
</aside>
