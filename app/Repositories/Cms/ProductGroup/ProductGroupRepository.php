<?php

namespace App\Repositories\Cms\ProductGroup;

use App\Models\ProductGroup;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class ProductGroupRepository extends BaseRepository
{
    public function model()
    {
        return ProductGroup::class;
    }

    public function createOrUpdateGroupProduct(array $data, int $id = null)
    {
        return parent::save([
            'pro_group_name' => $data['pro_group_name'],
            'pro_group_slug' => Str::slug($data['pro_group_name'], '-'),
            'pro_group_description' => $data['pro_group_description'],
            'pro_group_parent_id' => $data['pro_group_parent_id'],
            'pro_group_status' => 1,
            'user_practise' => auth()->guard('web')->user()->name,
        ], $id);
    }
}
