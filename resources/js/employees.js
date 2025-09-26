document.addEventListener('DOMContentLoaded', ()=>{
  // ตัวอย่าง: auto submit เมื่อเปลี่ยน filter select
  document.querySelectorAll('.filters select').forEach(sel=>{
    sel.addEventListener('change', ()=> sel.closest('form').submit());
  });
});
