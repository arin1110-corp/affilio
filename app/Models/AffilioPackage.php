<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffilioPackage extends Model
{
    protected $table = 'affilio_packages';
    protected $primaryKey = 'package_id';

    protected $fillable = [
        'package_uid',
        'package_name',
        'package_slug',
        'package_description',
        'package_price',
        'package_duration_month',
        'package_limit_user',
        'package_order',
        'can_use_subdomain',
        'can_manage_product',
        'can_manage_category',
        'can_manage_social',
        'can_manage_theme',
        'can_receive_order',
        'package_badge',
        'package_status',
    ];

    public function features()
    {
        return $this->hasMany(AffilioPackageFeature::class, 'feature_package_id', 'package_id')
            ->orderBy('feature_order', 'asc');
    }
}