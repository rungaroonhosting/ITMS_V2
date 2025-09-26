<?php

use Illuminate\Support\Facades\Route;

// หน้าแรก → ไปหน้า login หรือ dashboard ตามต้องการ
Route::get('/', function () {
    return redirect()->route('/login');
});

// -------------------- Auth scaffolding --------------------
// ถ้าคุณใช้ Breeze/Fortify ให้คง routes เดิมไว้
// Route::get('/login', ...); Route::post('/login', ...); ฯลฯ

// -------------------- พื้นที่ต้องล็อกอิน --------------------
Route::middleware(['auth'])->group(function () {

    // Dashboard (ปรับเป็นของคุณ)
    Route::get('/dashboard', function () {
        return view('dashboard'); // ใส่ view ที่คุณมีจริง
    })->name('dashboard');

    // ตัวอย่าง Employees module (ปรับเป็นของคุณ)
    // Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
});

// -------------------- เมื่อพร้อมใช้ Role แล้ว (seed & alias ครบ) --------------------
// เปิดบล็อกนี้หลังจากสร้าง role และ assign ให้ user แล้ว
/*
Route::middleware(['auth','role:SUPER ADMIN'])->group(function () {
    // routes ที่เฉพาะ SUPER ADMIN เท่านั้น
});
*/
