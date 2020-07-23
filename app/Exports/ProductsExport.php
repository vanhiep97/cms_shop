<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        $products = Product::with('manufacture', 'productGroup')->get();
        foreach ($products as $key => $value) {
            $product[] = array(
                '0' => $key + 1,
                '1' => $value->product_code,
                '2' => $value->product_name,
                '3' => $value->product_amount,
                '4' => $value->product_amount_inventory,
                '5' => $value->product_origin_price,
                '6' => $value->product_sell_price,
                '7' => $value->manufacture->manufacture_name,
                '8' => $value->productGroup->pro_group_name,
                '9' => $value->product_image_url,
                '10' => $value->product_description,
                '11' => $value->user_practise,
                '12' => $value->product_status == 1 ? "Đang kinh doanh" : 'Ngừng kinh doanh',
                '13' => $value->created_at,
                '14' => $value->updated_at,
            );
        }
        return (collect($product));
    }

    public function headings(): array
    {
        return [
            '#',
            'Mã sản phẩm',
            'Tên sản phẩm',
            'Số lượng',
            'SL tồn kho',
            "Giá vốn",
            "Giá bán ra",
            'Nhà sản xuất',
            'Danh mục',
            'URL Hình ảnh',
            'Mô tả',
            'Người tạo',
            'Trạng thái',
            'Ngày tạo',
            'Ngày cập nhật'
        ];
    }
}
