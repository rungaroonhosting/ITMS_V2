<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
public function index()
{
return view('dashboard.index');
}

public function metrics()
{
// ตัวอย่าง mocked data — สามารถแทนที่ด้วย Eloquent จริงได้เลย
// เช่น Incident::open()->count(), ServiceRequest::pending()->count(), etc.
return response()->json([
'open_incidents' => 7,
'pending_requests' => 12,
'assets_total' => 148,
'sla_breaches_today' => 1,
]);
}

public function trends()
{
// line chart: incidents 30 วันย้อนหลัง
$labels = [];
$incidents = [];
$requests = [];

for ($i = 29; $i >= 0; $i--) {
$date = now()->subDays($i);
$labels[] = $date->format('d/M');
// mocked data: สุ่มเล็กน้อย
$incidents[] = rand(0, 6);
$requests[] = rand(2, 10);
}

// donut chart: breakdown ประเภท ticket
$ticketByType = [
'Incident' => 44,
'Service Request' => 31,
'Change' => 9,
'Problem' => 5,
];

return response()->json([
'labels' => $labels,
'incidents' => $incidents,
'requests' => $requests,
'ticketByType' => $ticketByType,
]);
}

public function topAssets()
{
// ตาราง Top assets ตามจำนวน ticket (mocked)
return response()->json([
['asset' => 'IT-NB-001 (Dell 7420)', 'tickets' => 6],
['asset' => 'IT-PC-014 (HP 800 G6)', 'tickets' => 5],
['asset' => 'PRN-2F (Brother 6xxx)', 'tickets' => 4],
['asset' => 'AP-HQ-03 (Unifi U6 Pro)', 'tickets' => 3],
['asset' => 'FW-HQ (MikroTik CCR2004)', 'tickets' => 3],
]);
}

public function recentActivities()
{
// Activity ล่าสุด 6 รายการ (mocked)
return response()->json([
['time' => now()->subMinutes(12)->toDateTimeString(), 'text' => 'Incident #INC-1042 assigned to Napat'],
['time' => now()->subMinutes(25)->toDateTimeString(), 'text' => 'SR #SR-203 created by Somchai'],
['time' => now()->subHour()->toDateTimeString(), 'text' => 'Asset IT-NB-001 warranty updated'],
['time' => now()->subHours(2)->toDateTimeString(), 'text' => 'Incident #INC-1041 resolved by Namwan'],
['time' => now()->subHours(4)->toDateTimeString(), 'text' => 'Policy v1.3 published'],
['time' => now()->subHours(6)->toDateTimeString(), 'text' => 'Change #CHG-55 approved'],
]);
}
}