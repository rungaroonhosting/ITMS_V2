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
    {{-- ===== LEFT : โปร่งใส (ไม่มีพื้นหลัง) + ข้อความ + Mascot ===== --}}
    <section class="left-pane" aria-label="Hero left">
      <div class="lp-copy">
        <h1 class="lp-title">บริการออนไลน์</h1>
        <div class="lp-sub">PROFESSIONAL IT MANAGEMENT SOLUTIONS</div>
        <p class="lp-lead">ให้คุณจัดการเรื่องต่าง ๆ ด้วยตัวคุณเอง ตลอด 24 ชั่วโมง</p>
      </div>

      {{-- แทน path ให้ตรงไฟล์จริง --}}
      <img src="{{ asset('images/mockup.png') }}" alt="Mascot" class="lp-hero">
    </section>

    {{-- ===== RIGHT : การ์ดฟอร์ม ===== --}}
    <section class="auth-card" role="region" aria-label="Login">
      <div class="auth-card__brand">
        {{-- โลโก้เป็นรูป (แก้ path ให้ตรงไฟล์จริง) --}}
        <img src="{{ asset('images/logo.png') }}" alt="RWebDesign" class="brand-img">
        <div class="brand-sub">www.rwd1989.com</div>
      </div>

      <h2 class="auth-card__title">เข้าสู่ระบบ</h2>

      <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <label class="f-field">
          <span class="f-label">อีเมล</span>
          <input id="email" type="email" name="email" value="{{ old('email') }}"
                 required autocomplete="username" autofocus class="f-control">
          @error('email') <span class="f-error">{{ $message }}</span> @enderror
        </label>

        <label class="f-field">
          <span class="f-label">รหัสผ่าน</span>
          <div class="f-password">
            <input id="password" type="password" name="password" required
                   autocomplete="current-password" class="f-control">
          </div>
          @error('password') <span class="f-error">{{ $message }}</span> @enderror
        </label>

        <div class="f-row">
          <label class="f-remember">
            <input type="checkbox" name="remember">
            <span>จดจำการเข้าสู่ระบบ</span>
          </label>

          @if (Route::has('password.request'))
            <a class="f-link" href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>
          @endif
        </div>

        <button type="submit" class="btn-primary">เข้าสู่ระบบ</button>
      </form>

      <footer class="auth-card__footer">
        © {{ date('Y') }} IT Management System · System by
        <strong>Rungaroon <em>Solution</em></strong>
      </footer>
    </section>
  </main>
</div>

</main>
</body>
</html>