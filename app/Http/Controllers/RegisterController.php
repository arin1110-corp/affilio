<?php

namespace App\Http\Controllers;

use App\Models\AffilioPackage;
use App\Models\AffilioUser;
use App\Models\AffilioStore;
use App\Models\AffilioOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class RegisterController extends Controller
{
    public function form($packageUid)
    {
        $package = AffilioPackage::where('package_uid', $packageUid)
            ->where('package_status', 'Aktif')
            ->firstOrFail();

        return view('public.register', compact('package'));
    }

    public function store(Request $request, $packageUid)
    {
        $package = AffilioPackage::where('package_uid', $packageUid)
            ->where('package_status', 'Aktif')
            ->firstOrFail();

        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:affilio_users,user_email',
            'user_password' => 'required|min:6',
            'user_whatsapp' => 'nullable|string|max:50',

            'store_username' => 'required|string|max:50|alpha_dash|unique:affilio_stores,store_username',
            'store_name' => 'required|string|max:255',
        ]);

        $user = AffilioUser::create([
            'user_uid' => Str::uuid(),
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_password' => Hash::make($request->user_password),
            'user_whatsapp' => $request->user_whatsapp,
            'user_status' => 'Menunggu Pembayaran',
        ]);

        $store = AffilioStore::create([
            'store_uid' => Str::uuid(),
            'store_user_id' => $user->user_id,
            'store_package_id' => $package->package_id,
            'store_username' => strtolower($request->store_username),
            'store_name' => $request->store_name,
            'store_description' => 'Landing page Affilio untuk promosi produk dan link marketplace.',
            'store_status' => 'Menunggu Pembayaran',
        ]);

        $orderCode = 'AFF-' . date('YmdHis') . '-' . strtoupper(Str::random(5));

        $order = AffilioOrder::create([
            'order_uid' => Str::uuid(),
            'order_code' => $orderCode,
            'order_user_id' => $user->user_id,
            'order_store_id' => $store->store_id,
            'order_package_id' => $package->package_id,
            'order_amount' => $package->package_price,
            'order_status' => 'Menunggu Pembayaran',
        ]);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $order->order_code,
                'gross_amount' => (int) $order->order_amount,
            ],
            'customer_details' => [
                'first_name' => $user->user_name,
                'email' => $user->user_email,
                'phone' => $user->user_whatsapp,
            ],
            'item_details' => [
                [
                    'id' => $package->package_slug,
                    'price' => (int) $package->package_price,
                    'quantity' => 1,
                    'name' => $package->package_name,
                ],
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $order->update([
            'midtrans_snap_token' => $snapToken,
        ]);

        return redirect()->route('checkout.show', $order->order_uid);
    }

    public function checkout($uid)
    {
        $order = AffilioOrder::with(['user', 'store', 'package'])
            ->where('order_uid', $uid)
            ->firstOrFail();

        return view('public.checkout', compact('order'));
    }
}