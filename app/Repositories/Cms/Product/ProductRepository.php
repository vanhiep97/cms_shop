<?php

namespace App\Repositories\Cms\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function model()
    {
        return Product::class;
    }

    public function createOrUpdateProduct(array $data, int $id = null)
    {
        $min = 0000000001;
        $max = 9999999999;
        $productCode = 'SP-'.random_int($min, $max);
        return parent::save([
            'product_name' => $data['product_name'],
            'product_code' => $productCode,
            'product_amount' => 0,
            'product_amount_inventory' => isset($data['product_amount']) ? $data['product_amount'] : 0,
            'product_origin_price' => $data['product_origin_price'],
            'product_sell_price' => $data['product_sell_price'],
            'product_inventory' => isset($data['product_inventory']) ? $data['product_inventory'] : 0,
            'product_allow_negative' => isset($data['product_allow_negative']) ? $data['product_allow_negative'] : 0,
            'product_manufacture_id' => $data['product_manufacture_id'],
            'product_group_id' => $data['product_group_id'],
            'product_image_url' => $data['product_image_url'],
            'product_description' => $data['product_description'],
            'user_practise' => auth()->user()->name,
            'product_status' => 1
        ], $id);
    }
}
