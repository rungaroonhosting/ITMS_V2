@extends('layouts.app')
<div class="header-actions">
<button id="refreshBtn" class="btn btn-primary">รีเฟรชข้อมูล</button>
</div>
</div>

<section class="grid grid-4">
<div class="kpi-card">
<div class="kpi-title">Incidents (Open)</div>
<div id="kpiIncidents" class="kpi-value">–</div>
</div>
<div class="kpi-card">
<div class="kpi-title">Requests (Pending)</div>
<div id="kpiRequests" class="kpi-value">–</div>
</div>
<div class="kpi-card">
<div class="kpi-title">Assets (Total)</div>
<div id="kpiAssets" class="kpi-value">–</div>
</div>
<div class="kpi-card warning">
<div class="kpi-title">SLA Breaches (Today)</div>
<div id="kpiSla" class="kpi-value">–</div>
</div>
</section>

<section class="grid grid-2">
<div class="panel">
<div class="panel-head">
<h3>Tickets 30 วันย้อนหลัง</h3>
</div>
<div class="panel-body">
<canvas id="trendChart" height="140"></canvas>
</div>
</div>
<div class="panel">
<div class="panel-head">
<h3>Ticket by Type</h3>
</div>
<div class="panel-body">
<canvas id="typeChart" height="140"></canvas>
</div>
</div>
</section>

<section class="grid grid-2">
<div class="panel">
<div class="panel-head">
<h3>Top Assets by Tickets</h3>
</div>
<div class="panel-body">
<table class="table" id="topAssetsTable">
<thead>
<tr>
<th>Asset</th>
<th class="right">Tickets</th>
</tr>
</thead>
<tbody>
<!-- filled by JS -->
</tbody>
</table>
</div>
</div>

<div class="panel">
<div class="panel-head">
<h3>Recent Activities</h3>
</div>
<div class="panel-body">
<ul class="timeline" id="recentActivities">
<!-- filled by JS -->
</ul>
</div>
</div>
</section>
</div>
@endsection