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
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">อีเมล</label>
            <input id="email" type="email" name="email" required autofocus>
        </div>

        <div class="form-group password-wrapper">
<label class="f-field">
  <span class="f-label">รหัสผ่าน</span>
  <div class="f-password">
    <input id="password" type="password" name="password" required autocomplete="current-password" class="f-control" placeholder="">
    <button type="button" class="pw-toggle" aria-label="แสดง/ซ่อนรหัสผ่าน" onclick="togglePassword()">
      <!-- ไอคอนตาแบบ SVG (คมกริบ) -->
      <svg class="icon-eye" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
        <path d="M12 5C6.5 5 2.2 8.6 1 12c1.2 3.4 5.5 7 11 7s9.8-3.6 11-7c-1.2-3.4-5.5-7-11-7Zm0 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" fill="currentColor"/>
      </svg>
    </button>
  </div>
  @error('password') <span class="f-error">{{ $message }}</span> @enderror
</label>

        </div>

<div class="flex items-center justify-between mt-2">
  <label class="flex items-center">
    <input type="checkbox" name="remember" class="mr-2">
    <span>จดจำการเข้าสู่ระบบ</span>
  </label>
  <a href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>
</div>

        <button type="submit" class="btn-primary">เข้าสู่ระบบ</button>
    </form>

    <!-- Footer -->
    <div class="auth-card__footer">
        © 2025 IT Management System · System by <strong>Rungaroon Solution</strong>
    </div>
</div>

  </main>
</div>
<script>
function togglePassword() {
    const input = document.getElementById("password");
    input.type = (input.type === "password") ? "text" : "password";
}
</script>

</main>
</body>
</html>