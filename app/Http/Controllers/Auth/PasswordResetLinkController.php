<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * แสดงฟอร์มลืมรหัสผ่าน
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * ส่งอีเมลลิงก์รีเซ็ตรหัสผ่าน
     */
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
