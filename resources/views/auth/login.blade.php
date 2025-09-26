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
      <!-- ฝั่งซ้าย (ข้อความ/ไอคอน) -->
      <aside class="hero-pane">
        <div class="hero-inner">
          <h1 class="hero-title">บริการออนไลน์</h1>
          <p class="hero-sub">
            ให้คุณจัดการกลุ่มเรื่องต่าง ๆ ด้วยตัวคุณเอง ตลอด 24 ชั่วโมง
            ระบบจัดการ IT ที่ครอบคลุมและใช้งานง่าย
          </p>
          <p class="hero-tag">Professional IT Management Solutions</p>

          <ul class="hero-badges" aria-label="features">
            <li>👥</li><li>💻</li><li>📦</li><li>🧾</li><li>🛠️</li><li>⚙️</li>
          </ul>

          <!-- เว้นที่สำหรับ Mascot -->
          <div class="hero-art" aria-label="Mascot slot">
            <div class="mascot-slot">MASCOT</div>
          </div>
        </div>
      </aside>

      <!-- ฝั่งขวา (ฟอร์ม) -->
      <section class="form-pane">
        <div class="brand">
          <!-- เว้นที่สำหรับ LOGO -->
          <div class="logo-slot" role="img" aria-label="Logo slot">LOGO</div>
          <p class="brand-sub">IT Management System v2.1</p>
        </div>

        <h2 class="form-title">เข้าสู่ระบบ</h2>

        @if ($errors->any())
          <div class="alert error">อีเมลหรือรหัสผ่านไม่ถูกต้อง</div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="login-form">
          @csrf

          <label class="field">
            <span>อีเมล</span>
            <input class="input" type="email" name="email" placeholder="กรอกอีเมล" required autocomplete="username">
          </label>

          <label class="field pass-wrap">
            <span>รหัสผ่าน</span>
            <input class="input" type="password" name="password" placeholder="กรอกรหัสผ่าน" required autocomplete="current-password" id="password">
            <button class="eye" type="button" data-toggle-pass aria-label="สลับการแสดงรหัสผ่าน">👁️</button>
          </label>

          <label class="remember">
            <input type="checkbox" name="remember"> จดจำการเข้าสู่ระบบ
          </label>

          <button type="submit" class="btn-primary">
            <span class="arrow">➜</span> เข้าสู่ระบบ
          </button>
        </form>

        <p class="foot">© 2025 IT Management System</p>
      </section>
    </section>
  </main>
</body>
</html>
