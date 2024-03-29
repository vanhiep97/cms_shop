<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillOrder extends Model
{
    protected $table = 'bill_orders';

    public $timestamps = true;

    protected $fillable = [
        'bill_code',
        'input_id',
        'bill_date',
        'user_practise',
        'supplier_id',
        'total_price',
        'notes',
        'sell_type',
        'coupon',
        'total_money',
        'total_quantity',
        'pair_pay',
        'lack',
        'bill_detail',
        'bill_status'
    ];

    public function sup()
    {
        return $this->belongsTo(Supllier::class, 'supplier_id');
    }

    public function input()
    {
        return $this->belongsTo(Input::class, 'input_id');
    }
}
