@extends('layouts.guest')
@section('title','เข้าสู่ระบบ')

@push('styles') @vite('resources/css/login.css') @endpush

@section('content')
<div class="login-wrap">
  <div class="panel box-gradient">
    <h1 style="margin:.25rem 0;">IT Management System</h1>
    <p>เข้าสู่ระบบเพื่อจัดการงาน IT</p>
  </div>

  <form method="POST" action="{{ route('login') }}" class="card login-card">
    @csrf
    @if ($errors->any())
      <div class="alert error" data-autohide>
        <ul style="margin:0;">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <label>อีเมล</label>
    <input class="input" type="email" name="email" required autofocus autocomplete="username">

    <label style="margin-top:.5rem;">รหัสผ่าน</label>
    <input class="input" type="password" name="password" required autocomplete="current-password">

    <div style="display:flex; justify-content:space-between; align-items:center; margin:.75rem 0;">
      <label><input type="checkbox" name="remember"> จดจำฉัน</label>
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>
      @endif
    </div>

    <button class="btn btn-primary" style="width:100%;">เข้าสู่ระบบ</button>
  </form>
</div>
@endsection
