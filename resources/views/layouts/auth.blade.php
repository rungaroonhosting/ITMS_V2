<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','เข้าสู่ระบบ | ITMS')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="login-orange">
  <!-- พื้นหลัง: gradient + grid + ดาววิบวับ -->
  <div class="bg-wrap">
  <div class="bg-gradient"></div>
  <div class="bg-grid"></div>
  <div class="bg-noise"></div>
  <div class="bg-stars"></div>
</div>

  <main class="login-shell">
    <section class="login-stage">
      <!-- Left: Hero / Illustration / Text -->
      <aside class="login-left">
        <div class="login-hero">
          <div class="login-hero-text">
            <h2 class="login-hero-title">บริการออนไลน์</h2>
            <p class="login-hero-sub">
              ให้คุณจัดการกลุ่มเรื่องต่าง ๆ ด้วยตัวคุณเอง ตลอด 24 ชั่วโมง
              ระบบจัดการ IT ที่ครอบคลุมและใช้งานง่าย
            </p>
            <p class="login-hero-tag">Professional IT Management Solutions</p>
            <ul class="login-badges">
              <li>👥</li><li>💻</li><li>📦</li><li>🧾</li><li>🛠️</li><li>⚙️</li>
            </ul>
          </div>

          <div class="login-hero-art">
            <!-- วางภาพมาสคอตที่ public/images/login/hero.png -->
            <img src="{{ asset('images/login/hero.svg') }}" alt="ITMS mascot" class="login-illustration">
            <!-- วงกลมเรืองแสงด้านหลัง -->
            <span class="glow glow-1"></span>
            <span class="glow glow-2"></span>
          </div>
        </div>
      </aside>

      <!-- Right: Auth Card -->
      <section class="login-right">
        <header class="login-brand">
          <img src="{{ asset('images/itms-logo.svg') }}" class="login-logo" alt="ITMS">
          <div class="login-brand-title">IT Management System <span class="muted">v2.1</span></div>
        </header>

        @yield('content')

        <footer class="login-foot">
          <div>© {{ date('Y') }} <strong>IT Management System</strong></div>
          <small>System by Rungaroon “Solution” — Version 2.1</small>
        </footer>
      </section>
    </section>
  </main>
</body>
</html>
