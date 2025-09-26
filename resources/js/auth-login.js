document.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelector('[data-toggle-pass]');
  if (!btn) return;
  const input = document.getElementById('password');
  btn.addEventListener('click', () => {
    input.type = input.type === 'password' ? 'text' : 'password';
  });
});
