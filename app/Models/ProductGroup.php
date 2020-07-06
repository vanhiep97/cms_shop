<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductGroup extends Model
{
    public $timestamps = true;

    protected $table = 'product_groups';

    protected $fillable = [
        'pro_group_name',
        'pro_group_slug',
        'pro_group_avatar',
        'pro_group_parent_id',
        'pro_group_description',
        'pro_group_status',
        'user_practise'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_group_id');
    }
}
