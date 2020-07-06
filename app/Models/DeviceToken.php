<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model
{
    public $timestamps = true;

    protected $table = 'device_tokens';

    protected $fillable = [
        'device_token',
        'ip_address',
        'browser_login',
        'user_id'
    ];

    protected $hidden = [
        'device_token',
        'ip_address',
        'browser_login',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
