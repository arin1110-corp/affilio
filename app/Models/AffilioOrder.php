<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffilioOrder extends Model
{
    protected $table = 'affilio_orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_uid',
        'order_code',
        'order_user_id',
        'order_store_id',
        'order_package_id',
        'order_amount',
        'order_status',
        'midtrans_snap_token',
        'midtrans_transaction_id',
        'midtrans_payment_type',
        'midtrans_transaction_status',
        'midtrans_response',
        'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(AffilioUser::class, 'order_user_id', 'user_id');
    }

    public function store()
    {
        return $this->belongsTo(AffilioStore::class, 'order_store_id', 'store_id');
    }

    public function package()
    {
        return $this->belongsTo(AffilioPackage::class, 'order_package_id', 'package_id');
    }
}