<?php

namespace App\Http\Controllers;

use App\Models\AffilioOrder;
use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function notification()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $notif = new Notification();

        $order = AffilioOrder::with(['user', 'store', 'package'])
            ->where('order_code', $notif->order_id)
            ->first();

        if (!$order) {
            return response()->json([
                'message' => 'Order tidak ditemukan',
            ], 404);
        }

        $transactionStatus = $notif->transaction_status;
        $fraudStatus = $notif->fraud_status ?? null;

        $status = 'Menunggu Pembayaran';

        if ($transactionStatus === 'capture') {
            if ($fraudStatus === 'challenge') {
                $status = 'Challenge';
            } else {
                $status = 'Dibayar';
            }
        } elseif ($transactionStatus === 'settlement') {
            $status = 'Dibayar';
        } elseif ($transactionStatus === 'pending') {
            $status = 'Menunggu Pembayaran';
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $status = 'Gagal';
        }

        $order->update([
            'order_status' => $status,
            'midtrans_transaction_id' => $notif->transaction_id ?? null,
            'midtrans_payment_type' => $notif->payment_type ?? null,
            'midtrans_transaction_status' => $transactionStatus,
            'midtrans_response' => json_encode($notif),
            'paid_at' => $status === 'Dibayar' ? Carbon::now() : $order->paid_at,
        ]);

        if ($status === 'Dibayar') {
            $expiredAt = Carbon::now()->addMonths($order->package->package_duration_month);

            $order->user->update([
                'user_status' => 'Aktif',
            ]);

            $order->store->update([
                'store_status' => 'Aktif',
                'store_expired_at' => $expiredAt,
            ]);
        }

        return response()->json([
            'message' => 'Notification processed',
        ]);
    }

    public function finish($uid)
    {
        $order = AffilioOrder::with(['store'])
            ->where('order_uid', $uid)
            ->firstOrFail();

        return view('public.payment-finish', compact('order'));
    }
}