<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Base / redirect
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => redirect()->route('dashboard'));

/*
|--------------------------------------------------------------------------
| Protected area
|--------------------------------------------------------------------------
| - คุณใช้ role:SUPER ADMIN อยู่แล้ว ผมคงไว้เหมือนเดิม
| - ถ้าอยากให้ทุก role เข้า dashboard ได้ ให้ตัด role:SUPER ADMIN ออก
*/
Route::middleware(['auth', 'role:SUPER ADMIN'])->group(function () {
    // Dashboard (ต้องมี view: resources/views/pages/dashboard.blade.php)
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Employees (กำหนดก็ต่อเมื่อมีคลาสอยู่จริง)
    |--------------------------------------------------------------------------
    */
    if (class_exists(\App\Http\Controllers\EmployeeController::class)) {
        // ตัวอย่าง: ใช้ resource เฉพาะที่จำเป็นก่อน
        Route::resource('employees', \App\Http\Controllers\EmployeeController::class)
            ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
        // ถ้าคุณมี route เพิ่มเติม ก็ใส่ต่อได้ที่นี่
        // Route::get('employees/export', [\App\Http\Controllers\EmployeeController::class, 'export'])->name('employees.export');
    }

    /*
    |--------------------------------------------------------------------------
    | Incidents (กำหนดก็ต่อเมื่อมีคลาสอยู่จริง)
    |--------------------------------------------------------------------------
    */
    if (class_exists(\App\Http\Controllers\IncidentController::class)) {
        // ตัวอย่าง: หน้า index + CRUD
        Route::resource('incidents', \App\Http\Controllers\IncidentController::class)
            ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
        // ตัวอย่าง filter/list อื่น ๆ สามารถคง logic ใน controller ได้ตามเดิม
    }
});

/*
|--------------------------------------------------------------------------
| Forgot / Reset Password (Laravel Breeze/Jetstream มาตรฐาน)
|--------------------------------------------------------------------------
| ถ้ายังไม่มี controller ให้สร้างตาม Breeze (แต่การประกาศ route ตรงนี้
| ไม่ทำให้ route:list ล้ม เพราะมันไม่ได้สะท้อนคลาสอื่น)
*/
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('/reset-password', [\App\Http\Controllers\Auth\NewPasswordController::class, 'store'])
        ->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Auth routes ของ Breeze/Jetstream (ถ้ามีไฟล์นี้จะถูกโหลดอัตโนมัติ)
|--------------------------------------------------------------------------
*/
if (file_exists(__DIR__ . '/auth.php')) {
    require __DIR__ . '/auth.php';
}

/*
|--------------------------------------------------------------------------
| Health check ง่าย ๆ (เลือกใช้ได้)
|--------------------------------------------------------------------------
*/
Route::get('/ping', fn () => response()->json(['ok' => true]));
