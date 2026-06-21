<?php

namespace App\Http\Controllers;

use App\Models\AffilioPackage;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPackage = AffilioPackage::count();
        $activePackage = AffilioPackage::where('package_status', 'Aktif')->count();

        return view('admin.dashboard', compact('totalPackage', 'activePackage'));
    }
}