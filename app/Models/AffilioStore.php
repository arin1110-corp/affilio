<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffilioStore extends Model
{
    protected $table = 'affilio_stores';
    protected $primaryKey = 'store_id';

    protected $fillable = [
        'store_uid',
        'store_user_id',
        'store_package_id',
        'store_username',
        'store_name',
        'store_logo',
        'store_primary_color',
        'store_secondary_color',
        'store_background_color',
        'store_text_color',
        'store_description',
        'store_expired_at',
        'store_status',
    ];

    protected $casts = [
        'store_expired_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(AffilioUser::class, 'store_user_id', 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(AffilioPackage::class, 'store_package_id', 'package_id');
    }
}