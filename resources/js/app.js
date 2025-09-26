import './bootstrap';

import Alpine from 'alpinejs';

import './theme.js';
import './employees.js';

window.Alpine = Alpine;

Alpine.start();

// Basic helpers
const $ = (sel, el=document) => el.querySelector(sel);
const $$ = (sel, el=document) => [...el.querySelectorAll(sel)];

// Active menu โดยเทียบ path
(() => {
  const path = location.pathname.replace(/\/+$/, '') || '/';
  $$('.nav a').forEach(a => {
    const href = a.getAttribute('href');
    if (href === path) a.classList.add('active');
  });
})();

// Toggle สำหรับมือถือ (ถ้าจะใช้)
window.toggleSidebar = () => {
  document.body.classList.toggle('sidebar-open');
};
