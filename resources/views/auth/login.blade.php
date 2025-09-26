<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>เข้าสู่ระบบ | ITMS</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="login-body">
  <!-- พื้นหลัง -->
 <div class="poster-bg">
  <div class="gradient"></div>
  <div class="noise"></div>

  <!-- extra decorations -->
  <span class="star s1"></span>
  <span class="star s2"></span>
  <span class="cross c1"></span>
  <span class="cross c2"></span>
  <span class="circle circ1"></span>
  <span class="circle circ2"></span>
  <span class="line l1"></span>
  <span class="line l2"></span>
</div>


  <!-- กล่องหลัก -->
  <main class="login-shell">
  <section class="login-card">
    
    {{-- ฝั่งซ้าย --}}
    <aside class="hero-pane hero-pane--tint hero-contrast hero-right">
  <div class="hero-inner">
    <!-- กล่องคำพูด -->
    <div class="speech-box">
      <h1 class="hero-title">บริการออนไลน์</h1>
      <p class="hero-sub">ให้คุณจัดการเรื่องต่าง ๆ ด้วยตัวคุณเอง ตลอด 24 ชั่วโมง</p>
      <p class="hero-tag">Professional IT Management Solutions</p>
    </div>

    <!-- รูป Mockup (จะถูกจัดไปชิดขวา) -->
    <figure class="mock-card mock-right">
      <img src="{{ asset('images/mockup.png') }}" alt="IT Admin Mockup">
    </figure>
  </div>
</aside>

    {{-- ฝั่งขวา --}}
    <section class="form-pane form-pane--card">
    {{-- โลโก้เหนือหัวข้อ (ถ้ามีไฟล์) --}}
    <div class="brand-logo">
        {{-- แก้ path ให้ตรงของคุณ --}}
        {{-- <img src="{{ asset('images/logo.png') }}" alt="ITMS Logo"> --}}
    </div>

    <h2 class="form-title">เข้าสู่ระบบ</h2>

    @if ($errors->any())
        <div class="alert error">อีเมลหรือรหัสผ่านไม่ถูกต้อง</div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="login-form">
    @csrf

    {{-- Email --}}
    <label class="field">
        <span>อีเมล</span>
        <input class="input" type="email" name="email"
               value="{{ old('email') }}" placeholder="กรอกอีเมล"
               required autocomplete="username">
        @error('email') <small class="error-text">{{ $message }}</small> @enderror
    </label>

    {{-- Password --}}
    <label class="field pass-wrap">
        <span>รหัสผ่าน</span>
        <input class="input" type="password" name="password"
               placeholder="กรอกรหัสผ่าน" required
               autocomplete="current-password" id="password">
        <button type="button" class="eye" data-toggle-pass aria-label="แสดง/ซ่อนรหัสผ่าน">👁</button>
        @error('password') <small class="error-text">{{ $message }}</small> @enderror
    </label>

    {{-- Remember + Forgot --}}
    <div class="form-row">
        <label class="remember">
            <input type="checkbox" name="remember"> จดจำการเข้าสู่ระบบ
        </label>
        @if (Route::has('password.request'))
            <a class="link" href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>
        @endif
    </div>

    {{-- Submit --}}
    <button type="submit" class="btn-primary btn-hero">เข้าสู่ระบบ</button>

    {{-- Register section --}}
    <div class="meta">
    <div class="sep"></div>
    <p class="foot">
        © 2025 IT Management System
        <span class="dot">•</span>
        <span class="by">System by <strong>Rungaroon <em>Solution</em></strong></span>
    </p>
</div>

</form>

<script>
document.addEventListener('click', e => {
  const btn = e.target.closest('[data-toggle-pass]');
  if(!btn) return;
  const input = document.getElementById('password');
  if(input) input.type = input.type === 'password' ? 'text' : 'password';
});
</script>

</section>

<script>
document.addEventListener('click', (e) => {
  const btn = e.target.closest('[data-toggle-pass]');
  if (!btn) return;
  const input = document.getElementById('password');
  if (!input) return;
  input.type = input.type === 'password' ? 'text' : 'password';
});
</script>

  </section>
</main>
</body>
</html>
