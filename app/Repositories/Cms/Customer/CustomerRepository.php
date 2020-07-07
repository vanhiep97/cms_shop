<?php

namespace App\Repositories\Cms\Customer;

use App\Models\Customer;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class CustomerRepository extends BaseRepository
{
    public function model()
    {
        return Customer::class;
    }

    public function createOrUpdateCustomer(array $data, int $id = null)
    {
        $min = 000001;
        $max = 999999;
        $customerCode = 'KH-' . random_int($min, $max);
        return parent::save([
            'customer_name' => $data['customer_name'],
            'customer_code' => $data['customer_code'] ? $data['customer_code'] : $customerCode,
            'customer_email' => $data['customer_email'],
            'customer_phone' => $data['customer_phone'],
            'customer_address' => $data['customer_address'],
            'customer_birthday' => $data['customer_birthday'],
            'customer_gender' => $data['customer_gender'],
            'user_practise' => auth()->guard('web')->user()->name,
        ], $id);
    }

    public function searchBrand($data)
    {
        return parent::query()->where('brand_name', 'like', '%' . $data . '%')->orderBy('id', 'DESC')->paginate(10);
    }
}
