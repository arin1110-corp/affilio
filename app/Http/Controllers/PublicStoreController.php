<?php

namespace App\Http\Controllers;

use App\Models\AffilioStore;

class PublicStoreController extends Controller
{
    public function show($username)
    {
        $store = AffilioStore::with('package')
            ->where('store_username', $username)
            ->where('store_status', 'Aktif')
            ->firstOrFail();

        return view('store.show', compact('store'));
    }
}