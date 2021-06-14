<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutStockBill extends Model
{
    protected $table = 'out_stock_bills';

    public $timestamps = true;

    protected $fillable = [
        'bill_out_stock_code', 'supplier_id',
        'bill_out_stock_date', 'bill_out_stock_reason',
        'total_price', 'total_quantity',
        'bill_out_stock_detail', 'user_practise',
        'bill_out_stock_status'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
