<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
<script>
  // ส่งข้อความจากเซิร์ฟเวอร์ (ตั้งค่าเมื่อมี error/status)
  window.laravelStatus = @json(session('status') ?? null);
  window.laravelErrorMessage = @json($errors->first() ?? session('error') ?? null);
</script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>ลืมรหัสผ่าน | ITMS</title>
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
        <h1 class="lp-title">ลืมรหัสผ่าน</h1>
        <div class="lp-sub">PROFESSIONAL IT MANAGEMENT SOLUTIONS</div>
        <p class="lp-lead">ให้คุณจัดการเรื่องต่าง ๆ ด้วยตัวคุณเอง ตลอด 24 ชั่วโมง</p>
        <p class="lp-lead">ระบบจัดการ IT ที่ครอบคลุมและใช้งานง่าย</p>
      </div>
      <img src="{{ asset('images/mockup.png') }}" alt="Mascot" class="lp-hero">
    </section>

    {{-- RIGHT --}}
<div class="auth-card">
  <div class="auth-card__logo">
    <img src="{{ asset('images/logo.png') }}" alt="RWebDesign">
  </div>

    <h2 class="auth-card__title title--center">ลืมรหัสผ่าน</h2>

  @if (session('status'))
    <div class="auth-alert auth-alert--success">
      {{ session('status') }}
    </div>
  @endif

  <form method="POST" action="{{ route('password.email') }}" class="auth-form">
    @csrf

    <label class="auth-field">
      <span class="auth-label">อีเมล</span>
      <input type="email" name="email" class="auth-input" required autofocus value="{{ old('email') }}">
      @error('email')
        <span class="auth-error">{{ $message }}</span>
      @enderror
    </label>

    <button type="submit" class="btn-primary">
      ส่งลิงก์รีเซ็ตรหัสผ่าน
    </button>
  </form>

  <div class="auth-card__footer">
    <a href="{{ route('login') }}" class="footer-brand">กลับไปหน้าเข้าสู่ระบบ</a>
  </div>
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
@if ($errors->any())
<script>
  window.laravelErrors = {!! json_encode($errors->all()) !!};
</script>
@endif

@if (session('error'))
<script>
  window.laravelErrorMessage = @json(session('error'));
</script>
@endif

@if (session('status'))
<script>
  window.laravelStatus = @json(session('status'));
</script>
@endif

</body>
</html>