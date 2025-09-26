@extends('layouts.app')
@section('title','Dashboard • ITMS')
@section('page','Dashboard')
@section('content')
  <div class="panel">
    <h3 style="margin-top:0">สรุประบบ</h3>
    <p style="opacity:.8">ยินดีต้อนรับ, {{ auth()->user()->name }}</p>
  </div>
@endsection
