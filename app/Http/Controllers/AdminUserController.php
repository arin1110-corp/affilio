<?php

namespace App\Http\Controllers;

use App\Models\AffilioUser;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = AffilioUser::with('store')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.user.index', compact('users'));
    }

    public function toggle($uid)
    {
        $user = AffilioUser::where('user_uid', $uid)->firstOrFail();

        $user->update([
            'user_status' => $user->user_status === 'Aktif' ? 'Nonaktif' : 'Aktif',
        ]);

        if ($user->store) {
            $user->store->update([
                'store_status' => $user->user_status,
            ]);
        }

        return back()->with('success', 'Status user berhasil diperbarui.');
    }
}