<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AffilioUser;
use App\Models\AffilioStore;
use App\Models\AffilioOrder;
use App\Models\AffilioPackage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AffilioDemoActiveUserSeeder extends Seeder
{
    public function run(): void
    {
        $package = AffilioPackage::where('package_slug', 'pemula')->first();

        if (!$package) {
            return;
        }

        $user = AffilioUser::firstOrCreate(
            ['user_email' => 'demo@affilio.store'],
            [
                'user_uid' => Str::uuid(),
                'user_name' => 'Demo User Affilio',
                'user_password' => Hash::make('demo12345'),
                'user_whatsapp' => '6281234567890',
                'user_status' => 'Aktif',
            ]
        );

        $store = AffilioStore::firstOrCreate(
            ['store_username' => 'demo'],
            [
                'store_uid' => Str::uuid(),
                'store_user_id' => $user->user_id,
                'store_package_id' => $package->package_id,
                'store_name' => 'Demo Store Affilio',
                'store_description' => 'Ini adalah contoh landing page aktif untuk melihat benefit user Affilio.',
                'store_primary_color' => '#7c3aed',
                'store_secondary_color' => '#2563eb',
                'store_background_color' => '#020617',
                'store_text_color' => '#ffffff',
                'store_expired_at' => Carbon::now()->addMonths(3),
                'store_status' => 'Aktif',
            ]
        );

        AffilioOrder::firstOrCreate(
            ['order_code' => 'AFF-DEMO-PAID'],
            [
                'order_uid' => Str::uuid(),
                'order_user_id' => $user->user_id,
                'order_store_id' => $store->store_id,
                'order_package_id' => $package->package_id,
                'order_amount' => $package->package_price,
                'order_status' => 'Dibayar',
                'paid_at' => Carbon::now(),
            ]
        );
    }
}