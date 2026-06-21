<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffilioAdmin extends Model
{
    protected $table = 'affilio_admins';
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_uid',
        'admin_name',
        'admin_email',
        'admin_password',
        'admin_status',
    ];

    protected $hidden = [
        'admin_password',
    ];
}