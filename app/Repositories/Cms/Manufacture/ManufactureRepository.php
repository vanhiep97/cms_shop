<?php

namespace App\Repositories\Cms\Manufacture;

use App\Models\Manufacture;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class ManufactureRepository extends BaseRepository
{
    public function model()
    {
        return Manufacture::class;
    }

    public function createOrUpdateManufacture(array $data, int $id = null)
    {
        return parent::save([
            'manufacture_name' => $data['manufacture_name'],
            'manufacture_slug' => Str::slug($data['manufacture_name'], '-'),
            'manufacture_description' => $data['manufacture_description'],
            'manufacture_status' => 1,
            'user_practise' => auth()->guard('web')->user()->name,
        ], $id);
    }
}
