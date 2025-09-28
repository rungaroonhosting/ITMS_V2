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
    <section class="auth-card">
      <div class="auth-card__brand">
        <img src="{{ asset('images/logo.png') }}" alt="RWebDesign" class="brand-img">
      </div>

      <h2 class="auth-card__title">เข้าสู่ระบบ</h2>
      <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf
        <label class="f-field">
          <span class="f-label">อีเมล</span>
          <input id="email" type="email" name="email" required class="f-control">
        </label>

        <label class="f-field">
          <span class="f-label">รหัสผ่าน</span>
          <input id="password" type="password" name="password" required class="f-control">
        </label>

        <div class="f-row">
          <label class="f-remember">
            <input type="checkbox" name="remember"> จดจำการเข้าสู่ระบบ
          </label>
          <a class="f-link" href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>
        </div>

        <button type="submit" class="btn-primary">เข้าสู่ระบบ</button>
      </form>

      <footer class="auth-card__footer">
        <p>© {{ date('Y') }} IT Management System</p>
        <p>System by <strong>Rungaroon Solution</strong></p>
      </footer>
    </section>
  </main>
</div>


</main>
</body>
</html>