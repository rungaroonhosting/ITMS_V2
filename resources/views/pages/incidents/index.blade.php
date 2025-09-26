@extends('layouts.app')
@section('title','Incidents • ITMS')
@section('page','Incidents')

@section('content')
<div class="panel">

  <form method="get" style="display:flex;gap:10px;align-items:center;margin-bottom:12px;">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="ค้นหา code / title"
           style="flex:1;padding:10px 12px;border-radius:10px;border:1px solid #1b2b4e;background:#0d1628;color:#e8edf6">
    <select name="status" style="padding:10px;border-radius:10px;background:#0d1628;color:#e8edf6;border:1px solid #1b2b4e">
      <option value="">Status</option>
      @foreach(['open','in_progress','resolved','closed'] as $s)
        <option value="{{ $s }}" @selected(request('status')===$s)>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
      @endforeach
    </select>
    <select name="severity" style="padding:10px;border-radius:10px;background:#0d1628;color:#e8edf6;border:1px solid #1b2b4e">
      <option value="">Severity</option>
      @foreach(['low','medium','high','critical'] as $s)
        <option value="{{ $s }}" @selected(request('severity')===$s)>{{ ucfirst($s) }}</option>
      @endforeach
    </select>
    <button class="btn">ค้นหา</button>
    <a href="{{ route('incidents.index') }}" class="btn secondary">ล้าง</a>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th>Code</th>
        <th>Title</th>
        <th>Severity</th>
        <th>Status</th>
        <th>Reporter</th>
        <th>Assignee</th>
        <th>Opened</th>
      </tr>
    </thead>
    <tbody>
      @forelse($incidents as $i)
      <tr>
        <td>{{ $i->code }}</td>
        <td>{{ $i->title }}</td>
        <td>
          <span class="badge {{ in_array($i->severity,['high','critical']) ? 'warn' : '' }}">
            {{ ucfirst($i->severity) }}
          </span>
        </td>
        <td>
          <span class="badge {{ $i->status==='resolved' || $i->status==='closed' ? 'ok' : '' }}">
            {{ ucfirst(str_replace('_',' ',$i->status)) }}
          </span>
        </td>
        <td>{{ $i->reporter->name ?? '-' }}</td>
        <td>{{ $i->assignee->name ?? '-' }}</td>
        <td>{{ optional($i->opened_at ?? $i->created_at)->format('Y-m-d H:i') }}</td>
      </tr>
      @empty
      <tr><td colspan="7" style="opacity:.7">ไม่พบข้อมูล</td></tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top:12px">{{ $incidents->links() }}</div>
</div>
@endsection

