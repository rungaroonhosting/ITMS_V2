<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// root -> ไปหน้า login
Route::get('/', fn() => redirect()->route('login'));

// แสดงฟอร์ม Login
Route::get('/login', fn () => view('auth.login'))->name('login');

// กด Login (ใช้ users ใน DB จริง)
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $remember = (bool) $request->boolean('remember');

    if (Auth::attempt($credentials, $remember)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard')->with('success', 'ยินดีต้อนรับ!');
    }

    return back()
        ->withErrors(['email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง'])
        ->onlyInput('email');
})->name('login.post')->middleware('throttle:5,1'); // กัน brute force

// ออกจากระบบ
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// Dashboard (ต้องล็อกอินก่อน)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
});
