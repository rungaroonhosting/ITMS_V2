@extends('layouts.app')
@section('title','แก้ไขพนักงาน')
@push('styles')  @vite('resources/css/employees.css')  @endpush
@push('scripts') @vite('resources/js/employees.js')   @endpush

@section('content')
<div class="card">
  <form method="POST" action="{{ route('employees.update',$employee) }}" style="padding:1rem;">
    @csrf @method('PUT')
    @include('employees._form')
    <div style="display:flex; gap:.5rem; margin-top:1rem;">
      <button class="btn btn-primary">บันทึกการแก้ไข</button>
      <a class="btn" href="{{ route('employees.index') }}">ย้อนกลับ</a>
    </div>
  </form>
</div>
@endsection
