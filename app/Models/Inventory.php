<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public $timestamps = true;

    protected $table = 'inventories';

    protected $fillable = [
        'product_id',
        'quantity',
        'user_practise'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
