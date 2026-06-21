<?php

namespace App\Http\Controllers;

use App\Models\AffilioUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = AffilioUser::where('user_email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->user_password)) {
            return back()->with('error', 'Email atau password salah.');
        }

        if ($user->user_status !== 'Aktif') {
            return back()->with('error', 'Akun belum aktif. Selesaikan pembayaran terlebih dahulu.');
        }

        session([
            'user_login' => true,
            'user_id' => $user->user_id,
            'user_name' => $user->user_name,
            'user_email' => $user->user_email,
        ]);

        return redirect()->route('user.dashboard');
    }

    public function logout()
    {
        session()->forget([
            'user_login',
            'user_id',
            'user_name',
            'user_email',
        ]);

        return redirect()->route('user.login');
    }
}