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
   {{-- ====== ฝั่งซ้าย (Hero) – เหมือนรูปแรก ====== --}}
<!-- LEFT / HERO  -->
<aside class="hero-pane is-soft">
  <div class="hero-inner two-col">
    <div class="hero-copy">
      <h1 class="hero-title">บริการออนไลน์</h1>
      <p class="hero-tag">PROFESSIONAL IT MANAGEMENT SOLUTIONS</p>
      <p class="hero-sub">ให้คุณจัดการเรื่องต่าง ๆ ด้วยตัวคุณเอง ตลอด 24 ชั่วโมง</p>
    </div>

    <figure class="hero-art">
      {{-- เปลี่ยนให้ตรงกับชื่อไฟล์รูปของคุณ --}}
      <img src="{{ asset('images/mockup.png') }}" alt="Mascot">
    </figure>
  </div>
</aside>


{{-- ====== ฝั่งขวา (Form) – ตามภาพตัวอย่าง ====== --}}
<section class="form-pane form--card clean">
<div class="login-right">
        <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo"> <!-- เผื่อที่โลโก้ -->
  <h2 class="form-heading">เข้าสู่ระบบ</h2>

  @if ($errors->any())
    <div class="alert error">อีเมลหรือรหัสผ่านไม่ถูกต้อง</div>
  @endif

  <form method="POST" action="{{ route('login') }}" class="login-form">
    @csrf

    {{-- email --}}
    <label class="field">
      <span>อีเมล</span>
      <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" placeholder="กรอกอีเมล" required autocomplete="username">
    </label>

    {{-- password --}}
    <label class="field pass-wrap">
  <span>รหัสผ่าน</span>
  <input id="password" type="password" name="password" class="input" placeholder="กรอกรหัสผ่าน" required>
  <button type="button" class="eye" id="togglePass" aria-label="สลับการแสดงรหัสผ่าน">👁️</button>
</label>
    <div class="form-row">
      <label class="remember">
        <input type="checkbox" name="remember"> จดจำการเข้าสู่ระบบ
      </label>
      @if (Route::has('password.request'))
        <a class="link" href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>
      @endif
    </div>

    <button type="submit" class="btn-primary wide">เข้าสู่ระบบ</button>

    <div class="meta">
      <div class="sep"></div>
      <p class="foot">
        © 2025 IT Management System
        <span class="dot">·</span>
        System by <strong>Rungaroon <em>Solution</em></strong>
      </p>
    </div>
  </form>
 </div>
</section>

{{-- toggle password --}}
<script>
document.addEventListener('click', e => {
  const btn = e.target.closest('[data-toggle-pass]');
  if(!btn) return;
  const ip = document.getElementById('password');
  if(ip) ip.type = ip.type === 'password' ? 'text' : 'password';
});
</script>
<script>
  (function(){
    const pass = document.getElementById('password');
    const btn  = document.getElementById('togglePass');
    if(pass && btn){
      btn.addEventListener('click', () => {
        pass.type = (pass.type === 'password') ? 'text' : 'password';
      });
    }
  })();
</script>

</main>
</body>
</html>