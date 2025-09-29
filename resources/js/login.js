<script>
  // เปิด/ปิด Loader
  function showLoader(){ document.getElementById('pageLoader')?.classList.remove('hidden') }
  function hideLoader(){ document.getElementById('pageLoader')?.classList.add('hidden') }

  // แสดงตอนหน้าเริ่มโหลด แล้วค่อยซ่อนเมื่อพร้อม
  document.addEventListener('DOMContentLoaded', () => {
    hideLoader();
    // ผูกกับฟอร์มล็อกอินเพื่อแสดงตอน submit
    const form = document.getElementById('loginForm');
    if(form){ form.addEventListener('submit', () => showLoader()); }
  });
</script>
