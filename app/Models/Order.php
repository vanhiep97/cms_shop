<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = true;

    protected $fillable = [
        'order_code',
        'sell_date',
        'user_practise',
        'customer_id',
        'total_origin_price',
        'total_price',
        'notes',
        'sell_type',
        'coupon',
        'total_money',
        'total_quantity',
        'customer_pay',
        'lack',
        'order_detail',
        'order_status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function exchangeBill()
    {
        return $this->hasOne(ExchangeBill::class, 'order_id');
    }
}
