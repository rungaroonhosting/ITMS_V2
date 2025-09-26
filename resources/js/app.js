import './bootstrap';

import Alpine from 'alpinejs';

import './theme.js';
import './employees.js';

// resources/js/app.js
import '../css/app.css';
import '../css/auth.css';   // ถ้ามี
import './auth.js';         // ถ้ามี

import '../css/auth.login.css';
import './auth.login.js';

import '../css/login.css';
import '../css/login.background.orange.css';

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
