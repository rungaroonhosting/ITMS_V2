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
<div class="auth">
  <main class="auth__grid">
    {{-- LEFT --}}
    <section class="left-pane">
      <div class="lp-copy">
        <h1 class="lp-title">บริการออนไลน์</h1>
        <div class="lp-sub">PROFESSIONAL IT MANAGEMENT SOLUTIONS</div>
        <p class="lp-lead">ให้คุณจัดการเรื่องต่าง ๆ ด้วยตัวคุณเอง ตลอด 24 ชั่วโมง</p>
        <p class="lp-lead">ระบบจัดการ IT ที่ครอบคลุมและใช้งานง่าย</p>
      </div>
      <img src="{{ asset('images/mockup.png') }}" alt="Mascot" class="lp-hero">
    </section>

    {{-- RIGHT --}}
<div class="login-box">
    <!-- Logo -->
<div class="auth-card__brand brand--center">
  <img src="{{ asset('images/logo.png') }}" alt="RWebDesign" class="brand-img">
</div>
<h2 class="auth-card__title title--center">เข้าสู่ระบบ</h2>


    <!-- Form -->
    <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">อีเมล</label>
            <input id="email" type="email" name="email" required autofocus class="auth-input">
        </div>

        <div class="form-group password-wrapper">
<label class="f-field">
  <span class="f-label">รหัสผ่าน</span>
  <div class="f-password">
    <input id="password" type="password" name="password" required autocomplete="current-password" class="f-control" placeholder="">
<button type="button" class="pw-toggle pw-1img" aria-pressed="false" aria-label="แสดงรหัสผ่าน" onclick="togglePassword1Img()">
  <img src="{{ asset('images/eye-open.png') }}" alt="" class="pw-icon">
</button>
  </div>
  @error('password') <span class="f-error">{{ $message }}</span> @enderror
</label>

        </div>

<div class="f-row">
  <label class="f-remember">
    <input type="checkbox" name="remember" class="mr-2">
    <span class="remember-text">จดจำการเข้าสู่ระบบ</span>
  </label>
<a href="{{ route('password.request') }}" class="forgot-password">ลืมรหัสผ่าน?</a>
</div>


        <button type="submit" class="btn-primary">เข้าสู่ระบบ</button>
    </form>

    <!-- Footer -->
<footer class="auth-card__footer">
  © {{ date('Y') }} IT Management System · System by
  <a href="https://www.rungaroonhosting.com"
     class="footer-brand"
     target="_blank" rel="noopener"
     aria-label="ไปที่เว็บไซต์ Rungaroon Solution">
     Rungaroon <span>Solution</span>
  </a>
</footer>

</div>

  </main>
</div>
<script>
  function togglePassword1Img(){
    const input = document.getElementById('password');
    const btn   = document.querySelector('.pw-toggle.pw-1img');
    const closed = input.type === 'password';   // กำลังจะ "เปิด" ให้เห็น

    input.type = closed ? 'text' : 'password';
    btn.classList.toggle('is-closed', !closed); // ถ้าเป็น text = เปิด → เอาเส้นออก

    btn.setAttribute('aria-pressed', closed ? 'true' : 'false');
    btn.setAttribute('aria-label', closed ? 'ซ่อนรหัสผ่าน' : 'แสดงรหัสผ่าน');
  }
</script>

</main>
{{-- Page Loader --}}
<div id="pageLoader" class="loader hidden" aria-hidden="true">
  <div class="loader__box">
    <div class="loader__ring"></div>
    <div class="loader__label">กำลังโหลด...</div>
  </div>
</div>
</body>
</html>