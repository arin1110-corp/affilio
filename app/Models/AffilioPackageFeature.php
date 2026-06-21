<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffilioPackageFeature extends Model
{
    protected $table = 'affilio_package_features';
    protected $primaryKey = 'feature_id';

    protected $fillable = [
        'feature_package_id',
        'feature_text',
        'feature_order',
    ];
}