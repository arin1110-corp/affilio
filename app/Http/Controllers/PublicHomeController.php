<?php

namespace App\Http\Controllers;

use App\Models\AffilioSetting;
use App\Models\AffilioPackage;

class PublicHomeController extends Controller
{
    public function index()
    {
        $setting = AffilioSetting::first();
        $packages = AffilioPackage::with('features')
            ->where('package_status', 'Aktif')
            ->orderBy('package_order', 'asc')
            ->get();

        return view('public.home', compact('setting', 'packages'));
    }

    public function pricing()
    {
        $setting = AffilioSetting::first();
        $packages = AffilioPackage::with('features')
            ->where('package_status', 'Aktif')
            ->orderBy('package_order', 'asc')
            ->get();

        return view('public.pricing', compact('setting', 'packages'));
    }
}