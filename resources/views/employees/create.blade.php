@extends('layouts.app')
@section('title','เพิ่มพนักงาน')
@push('styles')  @vite('resources/css/employees.css')  @endpush
@push('scripts') @vite('resources/js/employees.js')   @endpush

@section('content')
<div class="card">
  <form method="POST" action="{{ route('employees.store') }}" style="padding:1rem;">
    @csrf
    @include('employees._form')
    <div style="display:flex; gap:.5rem; margin-top:1rem;">
      <button class="btn btn-primary">บันทึก</button>
      <a class="btn" href="{{ route('employees.index') }}">ยกเลิก</a>
    </div>
  </form>
</div>
@endsection
