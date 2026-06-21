<?php

namespace App\Http\Controllers;

use App\Models\AffilioPackage;
use App\Models\AffilioPackageFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = AffilioPackage::with('features')
            ->orderBy('package_order', 'asc')
            ->get();

        return view('admin.package.index', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'package_slug' => 'required|string|max:255|unique:affilio_packages,package_slug',
            'package_description' => 'nullable|string',
            'package_price' => 'required|numeric|min:0',
            'package_duration_month' => 'required|integer|min:1',
            'package_limit_user' => 'nullable|integer|min:1',
            'package_order' => 'required|integer|min:0',
            'package_badge' => 'nullable|string|max:100',
            'package_status' => 'required|in:Aktif,Nonaktif',
        ]);

        $package = AffilioPackage::create([
            'package_uid' => Str::uuid(),
            'package_name' => $request->package_name,
            'package_slug' => Str::slug($request->package_slug),
            'package_description' => $request->package_description,
            'package_price' => $request->package_price,
            'package_duration_month' => $request->package_duration_month,
            'package_limit_user' => $request->package_limit_user,
            'package_order' => $request->package_order,
            'can_use_subdomain' => $request->has('can_use_subdomain'),
            'can_manage_product' => $request->has('can_manage_product'),
            'can_manage_category' => $request->has('can_manage_category'),
            'can_manage_social' => $request->has('can_manage_social'),
            'can_manage_theme' => $request->has('can_manage_theme'),
            'can_receive_order' => $request->has('can_receive_order'),
            'package_badge' => $request->package_badge,
            'package_status' => $request->package_status,
        ]);

        $features = $request->feature_text ?? [];

        foreach ($features as $index => $feature) {
            if ($feature) {
                AffilioPackageFeature::create([
                    'feature_package_id' => $package->package_id,
                    'feature_text' => $feature,
                    'feature_order' => $index + 1,
                ]);
            }
        }

        return back()->with('success', 'Paket berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:affilio_packages,package_id',
            'package_name' => 'required|string|max:255',
            'package_slug' => 'required|string|max:255|unique:affilio_packages,package_slug,' . $request->package_id . ',package_id',
            'package_description' => 'nullable|string',
            'package_price' => 'required|numeric|min:0',
            'package_duration_month' => 'required|integer|min:1',
            'package_limit_user' => 'nullable|integer|min:1',
            'package_order' => 'required|integer|min:0',
            'package_badge' => 'nullable|string|max:100',
            'package_status' => 'required|in:Aktif,Nonaktif',
        ]);

        $package = AffilioPackage::findOrFail($request->package_id);

        $package->update([
            'package_name' => $request->package_name,
            'package_slug' => Str::slug($request->package_slug),
            'package_description' => $request->package_description,
            'package_price' => $request->package_price,
            'package_duration_month' => $request->package_duration_month,
            'package_limit_user' => $request->package_limit_user,
            'package_order' => $request->package_order,
            'can_use_subdomain' => $request->has('can_use_subdomain'),
            'can_manage_product' => $request->has('can_manage_product'),
            'can_manage_category' => $request->has('can_manage_category'),
            'can_manage_social' => $request->has('can_manage_social'),
            'can_manage_theme' => $request->has('can_manage_theme'),
            'can_receive_order' => $request->has('can_receive_order'),
            'package_badge' => $request->package_badge,
            'package_status' => $request->package_status,
        ]);

        AffilioPackageFeature::where('feature_package_id', $package->package_id)->delete();

        $features = $request->feature_text ?? [];

        foreach ($features as $index => $feature) {
            if ($feature) {
                AffilioPackageFeature::create([
                    'feature_package_id' => $package->package_id,
                    'feature_text' => $feature,
                    'feature_order' => $index + 1,
                ]);
            }
        }

        return back()->with('success', 'Paket berhasil diperbarui.');
    }
}