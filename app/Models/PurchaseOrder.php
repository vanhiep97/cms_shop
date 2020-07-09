<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_orders';

    public $timestamps = true;

    protected $fillable = [
        'pur_order_code', 'supplier_id',
        'pur_order_date', 'notes',
        'total_price', 'total_quantity',
        'pur_order_detail', 'user_practise',
        'pur_order_status'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
