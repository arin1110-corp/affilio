<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AffilioAdmin;
use App\Models\AffilioSetting;
use App\Models\AffilioPackage;
use App\Models\AffilioPackageFeature;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AffilioInitialSeeder extends Seeder
{
    public function run(): void
    {
        AffilioAdmin::firstOrCreate(
            ['admin_email' => 'admin@affilio.store'],
            [
                'admin_uid' => Str::uuid(),
                'admin_name' => 'Admin Affilio',
                'admin_password' => Hash::make('admin12345'),
                'admin_status' => 'Aktif',
            ]
        );

        AffilioSetting::firstOrCreate(
            ['setting_id' => 1],
            [
                'site_name' => 'Affilio',
                'site_tagline' => 'Create. Promote. Convert.',
                'site_description' => 'Affilio adalah platform landing page untuk affiliate marketer, creator, UMKM, dan pemilik toko online.',
                'primary_color' => '#2563eb',
                'secondary_color' => '#4f46e5',
                'hero_title' => 'Buat Landing Page Affiliate Dalam Hitungan Menit',
                'hero_subtitle' => 'Affilio membantu kamu membuat halaman promosi sendiri, menaruh produk marketplace, link affiliate, sosial media, dan branding toko dalam satu link.',
                'hero_button_text' => 'Mulai Sekarang',
                'hero_button_link' => '/pricing',
                'about_title' => 'Apa itu Affilio?',
                'about_description' => 'Affilio adalah platform digital untuk membuat landing page promosi, affiliate store, dan toko sederhana yang dapat digunakan oleh affiliate marketer, content creator, UMKM, dan pemilik toko marketplace.',
                'contact_email' => 'support@affilio.store',
                'contact_whatsapp' => '6281234567890',
                'footer_text' => '© ' . date('Y') . ' Affilio. All rights reserved.',
            ]
        );

        $pemula = AffilioPackage::firstOrCreate(
            ['package_slug' => 'pemula'],
            [
                'package_uid' => Str::uuid(),
                'package_name' => 'Paket Pemula',
                'package_description' => 'Paket early access untuk 1.000 user pertama selama 3 bulan.',
                'package_price' => 18900,
                'package_duration_month' => 3,
                'package_limit_user' => 1000,
                'package_order' => 1,
                'can_use_subdomain' => true,
                'can_manage_product' => true,
                'can_manage_category' => true,
                'can_manage_social' => true,
                'can_manage_theme' => true,
                'can_receive_order' => false,
                'package_badge' => 'Early Access',
                'package_status' => 'Aktif',
            ]
        );

        $owner = AffilioPackage::firstOrCreate(
            ['package_slug' => 'owner-web'],
            [
                'package_uid' => Str::uuid(),
                'package_name' => 'Owner Web',
                'package_description' => 'Paket website resmi untuk pemilik usaha yang ingin menerima order langsung tanpa marketplace.',
                'package_price' => 1000000,
                'package_duration_month' => 12,
                'package_limit_user' => null,
                'package_order' => 2,
                'can_use_subdomain' => true,
                'can_manage_product' => true,
                'can_manage_category' => true,
                'can_manage_social' => true,
                'can_manage_theme' => true,
                'can_receive_order' => true,
                'package_badge' => 'Premium',
                'package_status' => 'Aktif',
            ]
        );

        $features = [
            $pemula->package_id => [
                'Username.affilio.store',
                'Kelola kategori produk',
                'Kelola produk dengan link marketplace',
                'Kelola sosial media',
                'Setting warna dan konten sederhana',
                'Chat manual ke admin',
            ],
            $owner->package_id => [
                'Website resmi untuk brand sendiri',
                'Kelola produk tanpa marketplace',
                'Pembayaran langsung ke toko',
                'Setting tampilan lebih lengkap',
                'Bantuan setup awal',
                'Cocok untuk UMKM dan brand owner',
            ],
        ];

        foreach ($features as $packageId => $items) {
            foreach ($items as $index => $text) {
                AffilioPackageFeature::firstOrCreate([
                    'feature_package_id' => $packageId,
                    'feature_text' => $text,
                ], [
                    'feature_order' => $index + 1,
                ]);
            }
        }
    }
}