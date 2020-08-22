<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = true;

    protected $table = 'customers';

    protected $fillable = [
        'customer_name',
        'customer_code',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_birthday',
        'customer_gender',
        'user_practise',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function exchangeBills()
    {
        return $this->hasMany(ExchangeBill::class, 'customer_id');
    }
}
