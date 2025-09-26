<?php
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('dashboard'));

//Route::middleware(['auth'])->group(function () {
Route::middleware(['auth','role:SUPER ADMIN'])->group(function () {
    // ต้องเป็น pages.dashboard
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::view('/admin', 'pages.admin')->name('admin.index');
    });

    Route::middleware('role:it|admin')->group(function () {
        Route::view('/it/console', 'pages.it-console')->name('it.console');

	Route::get('/', fn()=>redirect()->route('employees.index'))->name('dashboard'); // ถ้ายังไม่มีแดชบอร์ดจริง
	Route::resource('employees', EmployeeController::class);
//        Route::get('/incidents', fn()=>view('pages.incidents.index'))->name('incidents.index');
	Route::get('/incidents', [IncidentController::class, 'index'])->name('incidents.index');
        Route::get('/assets', fn()=>view('pages.assets.index'))->name('assets.index');
        Route::get('/requests', fn()=>view('pages.requests.index'))->name('requests.index');
    });
});

require __DIR__.'/auth.php';

