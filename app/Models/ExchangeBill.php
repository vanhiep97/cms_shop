<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeBill extends Model
{
    protected $tablde = 'exchange_bills';

    public $timestamps = true;

    protected $fillable = [
        'exchange_code', 'exchange_date',
        'order_id', 'customer_id', 'exchange_date',
        'exchange_detail', 'exchange_amount', 'exchange_price',
        'exchange_refund', 'exchange_reason', 'user_practise'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
