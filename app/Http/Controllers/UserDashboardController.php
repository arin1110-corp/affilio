<?php

namespace App\Http\Controllers;

use App\Models\AffilioStore;

class UserDashboardController extends Controller
{
    public function index()
    {
        $store = AffilioStore::with('package')
            ->where('store_user_id', session('user_id'))
            ->firstOrFail();

        return view('user.dashboard', compact('store'));
    }
}