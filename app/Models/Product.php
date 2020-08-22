<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $timestamps = true;

    protected $table = 'products';

    protected $fillable = [
        'product_code',
        'product_name',
        'product_amount',
        'product_amount_inventory',
        'product_amount_defective',
        'product_origin_price',
        'product_sell_price',
        'product_inventory',
        'product_allow_negative',
        'product_manufacture_id',
        'product_group_id',
        'product_image_url',
        'product_description',
        'user_practise',
        'product_status'
    ];

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class, 'product_manufacture_id');
    }

    public function productGroup()
    {
        return $this->belongsTo(ProductGroup::class, 'product_group_id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'product_id');
    }

    public function productDefectives()
    {
        return $this->hasMany(productDefectives::class, 'product_id');
    }
}
