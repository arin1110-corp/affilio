<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffilioUser extends Model
{
    protected $table = 'affilio_users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_uid',
        'user_name',
        'user_email',
        'user_password',
        'user_whatsapp',
        'user_status',
    ];

    protected $hidden = [
        'user_password',
    ];

    public function store()
    {
        return $this->hasOne(AffilioStore::class, 'store_user_id', 'user_id');
    }
}