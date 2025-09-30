import Chart from 'chart.js/auto';

const $ = (s) => document.querySelector(s);
const $$ = (s) => Array.from(document.querySelectorAll(s));

// KPI
async function loadMetrics(){
const r = await fetch('/api/dashboard/metrics');
const data = await r.json();
$('#kpiIncidents').textContent = data.open_incidents ?? '-';
$('#kpiRequests').textContent = data.pending_requests ?? '-';
$('#kpiAssets').textContent = data.assets_total ?? '-';
$('#kpiSla').textContent = data.sla_breaches_today ?? '-';
}

// Charts
let trendChart, typeChart;
async function loadTrends(){
const r = await fetch('/api/dashboard/trends');
const { labels, incidents, requests, ticketByType } = await r.json();

// Line: incidents/requests 30 วัน
const ctx1 = document.getElementById('trendChart');
if (trendChart) trendChart.destroy();
trendChart = new Chart(ctx1, {
type: 'line',
data: {
labels,
datasets: [
{ label: 'Incidents', data: incidents, tension: .35 },
{ label: 'Requests', data: requests, tension: .35 },
]
},
options: {
responsive: true,
maintainAspectRatio: false,
plugins: { legend: { display: true } },
scales: { y: { beginAtZero: true } }
}
});

// Doughnut: ticket by type
const ctx2 = document.getElementById('typeChart');
const labels2 = Object.keys(ticketByType);
const data2 = Object.values(ticketByType);
if (typeChart) typeChart.destroy();
typeChart = new Chart(ctx2, {
type: 'doughnut',
data: { labels: labels2, datasets: [{ data: data2 }] },
options: { responsive: true, maintainAspectRatio: false }
});
}

// Tables
async function loadTopAssets(){
const r = await fetch('/api/dashboard/top-assets');
const rows = await r.json();
const tbody = document.querySelector('#topAssetsTable tbody');
tbody.innerHTML = rows.map(x => `
<tr><td>${x.asset}</td><td class="right">${x.tickets}</td></tr>
`).join('');
}

async function loadRecent(){
const r = await fetch('/api/dashboard/recent-activities');
const items = await r.json();
const ul = document.querySelector('#recentActivities');
ul.innerHTML = items.map(x => `
<li><strong>${new Date(x.time).toLocaleString()}</strong> — ${x.text}</li>
`).join('');
}

async function boot(){
await Promise.all([loadMetrics(), loadTrends(), loadTopAssets(), loadRecent()]);
}

window.addEventListener('DOMContentLoaded', boot);
$('#refreshBtn')?.addEventListener('click', boot);