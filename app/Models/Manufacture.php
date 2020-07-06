<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Manufacture extends Model
{
    public $timestamps = true;

    protected $table = 'manufactures';

    protected $fillable = [
        'manufacture_name',
        'manufacture_slug',
        'manufacture_description',
        'manufacture_status',
        'user_practise'
    ];

    public function Products()
    {
        return $this->hasMany(Product::class, 'product_manufacture_id');
    }
}
