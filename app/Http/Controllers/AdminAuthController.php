<?php

namespace App\Http\Controllers;

use App\Models\AffilioAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = AffilioAdmin::where('admin_email', $request->email)
            ->where('admin_status', 'Aktif')
            ->first();

        if (!$admin || !Hash::check($request->password, $admin->admin_password)) {
            return back()->with('error', 'Email atau password salah.');
        }

        session([
            'admin_id' => $admin->admin_id,
            'admin_name' => $admin->admin_name,
            'admin_email' => $admin->admin_email,
            'admin_login' => true,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('admin.login');
    }
}