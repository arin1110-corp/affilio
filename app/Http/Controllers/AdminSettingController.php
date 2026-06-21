<?php

namespace App\Http\Controllers;

use App\Models\AffilioSetting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting = AffilioSetting::first();

        return view('admin.setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',

            'primary_color' => 'required|string|max:20',
            'secondary_color' => 'required|string|max:20',
            'base_color' => 'required|string|max:20',
            'surface_color' => 'required|string|max:20',
            'card_color' => 'required|string|max:20',
            'text_color' => 'required|string|max:20',
            'muted_text_color' => 'required|string|max:20',

            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'hero_button_text' => 'nullable|string|max:100',
            'hero_button_link' => 'nullable|string|max:255',
            'about_title' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_whatsapp' => 'nullable|string|max:50',
            'footer_text' => 'nullable|string',
        ]);

        $setting = AffilioSetting::first();

        if (!$setting) {
            $setting = new AffilioSetting();
        }

        $setting->fill($request->all());
        $setting->save();

        return back()->with('success', 'Setting website berhasil diperbarui.');
    }
}