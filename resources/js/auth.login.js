document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-toggle-pass]').forEach(btn => {
    btn.addEventListener('click', () => {
      const wrap = btn.closest('.login-passwrap');
      const input = wrap?.querySelector('input');
      if (!input) return;
      input.type = input.type === 'password' ? 'text' : 'password';
    });
  });
});
