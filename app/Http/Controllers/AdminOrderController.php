<?php

namespace App\Http\Controllers;

use App\Models\AffilioOrder;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = AffilioOrder::with(['user', 'store', 'package'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.order.index', compact('orders'));
    }
}