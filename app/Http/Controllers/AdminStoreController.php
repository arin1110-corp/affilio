<?php

namespace App\Http\Controllers;

use App\Models\AffilioStore;

class AdminStoreController extends Controller
{
    public function index()
    {
        $stores = AffilioStore::with(['user', 'package'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.store.index', compact('stores'));
    }

    public function toggle($uid)
    {
        $store = AffilioStore::where('store_uid', $uid)->firstOrFail();

        $store->update([
            'store_status' => $store->store_status === 'Aktif' ? 'Nonaktif' : 'Aktif',
        ]);

        return back()->with('success', 'Status store berhasil diperbarui.');
    }
}