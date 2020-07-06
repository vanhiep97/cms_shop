<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $table = 'inputs';

    public $timestamps = true;

    protected $fillable = [
        'input_code', 'supplier_id',
        'input_date', 'notes',
        'total_price', 'total_quantity',
        'discount', 'total_money', 'lack',
        'user_practise', 'input_status'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
