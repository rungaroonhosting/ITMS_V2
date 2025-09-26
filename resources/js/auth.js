document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-toggle-pass]').forEach(btn => {
    btn.addEventListener('click', () => {
      const input = btn.closest('.auth-password').querySelector('input[type="password"], input[type="text"]');
      if (!input) return;
      const isPass = input.type === 'password';
      input.type = isPass ? 'text' : 'password';
      btn.classList.toggle('is-on', isPass);
    });
  });
});
