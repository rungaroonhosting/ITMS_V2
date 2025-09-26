@extends('layouts.app')
@section('title','จัดการพนักงาน')
@section('breadcrumbs') หน้าหลัก / จัดการพนักงาน @endsection
@push('styles')  @vite('resources/css/employees.css')  @endpush
@push('scripts') @vite('resources/js/employees.js')   @endpush

@section('content')
<div class="box-gradient" style="padding:1rem; border-radius:var(--radius);">
  <div style="display:flex; justify-content:space-between; align-items:center;">
    <div>
      <h2 style="margin:0;">จัดการพนักงาน</h2>
      <div>ดู/ค้นหา/แก้ไข/เพิ่มพนักงาน</div>
    </div>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">+ เพิ่มพนักงานใหม่</a>
  </div>
</div>

<div class="card" style="margin-top:1rem;">
  <form class="filters" method="GET" style="display:flex; gap:.5rem; padding:1rem;">
    <input class="input" type="text" name="q" value="{{ request('q') }}" placeholder="ค้นหาชื่อ, อีเมล, รหัส…">
    <select class="input" name="branch_id">
      <option value="">สาขาทั้งหมด</option>
      @foreach($branches as $b)
        <option value="{{ $b->id }}" @selected(request('branch_id')==$b->id)>{{ $b->name }}</option>
      @endforeach
    </select>
    <select class="input" name="department_id">
      <option value="">แผนกทั้งหมด</option>
      @foreach($departments as $d)
        <option value="{{ $d->id }}" @selected(request('department_id')==$d->id)>{{ $d->name }}</option>
      @endforeach
    </select>
    <button class="btn">ค้นหา</button>
  </form>

  <div style="overflow:auto;">
    <table class="table">
      <thead>
        <tr>
          <th>รูป/รหัส</th><th>ชื่อ-นามสกุล</th><th>สาขา</th><th>แผนก</th>
          <th>ตำแหน่ง</th><th>ติดต่อ</th><th>สถานะ</th><th style="width:130px;">จัดการ</th>
        </tr>
      </thead>
      <tbody>
      @forelse($employees as $emp)
        <tr>
          <td>
            <div style="display:flex; align-items:center; gap:.6rem;">
              <img src="{{ $emp->avatar_url }}" style="width:42px;height:42px;border-radius:999px;object-fit:cover;">
              <span class="badge">{{ $emp->code }}</span>
            </div>
          </td>
          <td><strong>{{ $emp->full_name }}</strong><div class="muted">{{ $emp->nickname }}</div></td>
          <td>{{ $emp->branch?->name ?? '-' }}</td>
          <td>{{ $emp->department?->name ?? '-' }}</td>
          <td>{{ $emp->position ?? '-' }}</td>
          <td><a href="mailto:{{ $emp->email }}">{{ $emp->email }}</a><div class="muted">{{ $emp->phone }}</div></td>
          <td>@if($emp->is_active)<span class="badge ok">ใช้งาน</span>@else<span class="badge danger">ปิดใช้งาน</span>@endif</td>
          <td>
            <div style="display:flex; gap:.4rem;">
              <a class="btn" href="{{ route('employees.edit',$emp) }}">แก้ไข</a>
              <form method="POST" action="{{ route('employees.destroy',$emp) }}" onsubmit="return confirm('ลบพนักงานนี้?')">
                @csrf @method('DELETE')
                <button class="btn btn-danger">ลบ</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr><td colspan="8" style="text-align:center; padding:2rem;">ไม่พบข้อมูล</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>

  <div style="padding:.75rem 1rem;">
    {{ $employees->withQueryString()->links() }}
  </div>
</div>
@endsection
