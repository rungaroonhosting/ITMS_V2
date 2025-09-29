/* resources/js/login.js (หรือ public/js/login.js หากไม่ใช้ Vite)
   ใช้ได้กับหน้า: Login (#loginForm), Forgot Password (#forgotForm), Reset Password (#resetForm)
   ต้องมี SweetAlert2 โหลดไว้ก่อน (ผ่าน Vite หรือ <script src="...sweetalert2..."></script>) */

(function () {
  'use strict';

  // ----- SweetAlert helper -----
  const SA = (window.Swal ?? {
    fire: ({ title, text }) => alert(`${title ? title + '\n' : ''}${text ?? ''}`),
    showLoading: () => {},
    close: () => {}
  });

  const t = {
    required: 'กรอกข้อมูลให้ครบถ้วน',
    emailRequired: 'กรุณากรอกอีเมล',
    emailInvalid: 'รูปแบบอีเมลไม่ถูกต้อง',
    passwordRequired: 'กรุณากรอกรหัสผ่าน',
    confirmPasswordRequired: 'กรุณากรอกรหัสผ่านยืนยัน',
    passwordTooShort: 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร',
    passwordNotMatch: 'รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน',
    loggingIn: 'กำลังเข้าสู่ระบบ...',
    sending: 'กำลังส่งข้อมูล...',
    success: 'สำเร็จ',
    failed: 'ไม่สำเร็จ'
  };

  // ----- Utilities -----
  const $ = (sel, ctx = document) => ctx.querySelector(sel);
  const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));
  const isEmail = (s) =>
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(s || '').trim());

  function withLoading(button, text) {
    if (!button) return () => {};
    const prev = { html: button.innerHTML, disabled: button.disabled };
    button.disabled = true;
    button.innerHTML = `<span class="inline-block animate-pulse">${text}</span>`;
    return () => {
      button.disabled = prev.disabled;
      button.innerHTML = prev.html;
    };
  }

  function showError(msg, title = t.failed) {
    SA.fire({
      icon: 'error',
      title,
      text: msg,
      confirmButtonText: 'ตกลง'
    });
  }

  function showWarn(msg) {
    SA.fire({
      icon: 'warning',
      title: t.required,
      text: msg,
      confirmButtonText: 'ตกลง'
    });
  }

  function showSuccess(msg) {
    SA.fire({
      icon: 'success',
      title: t.success,
      text: msg,
      confirmButtonText: 'ตกลง'
    });
  }

  // ----- Toggle password visibility -----
  function bindTogglePassword(scope = document) {
    // รองรับ 2 แบบ:
    // (1) ปุ่มมี data-target="#passwordInputId"
    // (2) ปุ่มอยู่ถัดจาก input[type=password]
    $$('.js-toggle-password', scope).forEach((btn) => {
      btn.addEventListener('click', () => {
        let input = null;
        const targetSel = btn.getAttribute('data-target');
        if (targetSel) input = $(targetSel);
        if (!input) {
          // หา input[type=password] ที่ใกล้ที่สุดทางซ้าย
          const container = btn.closest('.relative, .input-group, .field') || btn.parentElement;
          input = container ? container.querySelector('input[type="password"], input[data-type="password"]') : null;
        }
        if (!input) return;

        const now = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', now);

        // ถ้ามีไอคอนภายในปุ่ม ให้สลับคลาสเล็กน้อย (optional)
        btn.classList.toggle('is-visible', now === 'text');
      });
    });
  }

  // ----- Per-form validators -----
  function bindLoginForm() {
    const form = $('#loginForm');
    if (!form) return;

    bindTogglePassword(form);

    form.addEventListener('submit', (e) => {
      const email = form.querySelector('input[type="email"]');
      const password = form.querySelector('input[type="password"], input[data-type="password"]');
      const submitBtn = form.querySelector('[type="submit"]');

      // ตรวจค่าว่าง
      if (!email?.value.trim()) {
        e.preventDefault();
        return showWarn(t.emailRequired);
      }
      if (!isEmail(email.value)) {
        e.preventDefault();
        return showWarn(t.emailInvalid);
      }
      if (!password?.value.trim()) {
        e.preventDefault();
        return showWarn(t.passwordRequired);
      }

      // กันกดซ้ำ + โหลดดิ้ง
      const restore = withLoading(submitBtn, t.loggingIn);
      // ปล่อยให้ submit เดินต่อ แล้วรีสโตร์เผื่อมี error กลับมา
      setTimeout(restore, 8000);
    });
  }

  function bindForgotForm() {
    const form = $('#forgotForm');
    if (!form) return;

    form.addEventListener('submit', (e) => {
      const email = form.querySelector('input[type="email"]');
      const submitBtn = form.querySelector('[type="submit"]');

      if (!email?.value.trim()) {
        e.preventDefault();
        return showWarn(t.emailRequired);
      }
      if (!isEmail(email.value)) {
        e.preventDefault();
        return showWarn(t.emailInvalid);
      }

      const restore = withLoading(submitBtn, t.sending);
      setTimeout(restore, 8000);
    });
  }

  function bindResetForm() {
    const form = $('#resetForm');
    if (!form) return;

    bindTogglePassword(form);

    form.addEventListener('submit', (e) => {
      const pass = form.querySelector('input[name="password"]');
      const confirm = form.querySelector('input[name="password_confirmation"]');
      const submitBtn = form.querySelector('[type="submit"]');

      if (!pass?.value.trim()) {
        e.preventDefault();
        return showWarn(t.passwordRequired);
      }
      if (pass.value.length < 8) {
        e.preventDefault();
        return showWarn(t.passwordTooShort);
      }
      if (!confirm?.value.trim()) {
        e.preventDefault();
        return showWarn(t.confirmPasswordRequired);
      }
      if (pass.value !== confirm.value) {
        e.preventDefault();
        return showWarn(t.passwordNotMatch);
      }

      const restore = withLoading(submitBtn, t.sending);
      setTimeout(restore, 8000);
    });
  }

  // ----- Boot -----
  document.addEventListener('DOMContentLoaded', () => {
    bindLoginForm();
    bindForgotForm();
    bindResetForm();

    // แจ้งผลจากฝั่ง Laravel (ฝังตัวแปรใน Blade ก่อนโหลดไฟล์นี้)
    if (window.laravelErrorMessage) {
      showError(window.laravelErrorMessage);
    }
    if (window.laravelStatus) {
      showSuccess(window.laravelStatus);
    }
  });
})();
