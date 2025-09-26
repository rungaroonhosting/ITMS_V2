document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.alert[data-autohide]').forEach(el=>{
    setTimeout(()=> el.remove(), 3500);
  });
});
