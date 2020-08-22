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
                '3' => $value->product_amount ? $value->product_amount : 0,
                '4' => $value->product_amount_inventory ? $value->product_amount_inventory : 0,
                '5' => $value->product_amount_defective ? $value->product_amount_defective : 0,
                '6' => $value->product_origin_price ? $value->product_origin_price : 0,
                '7' => $value->product_sell_price ? $value->product_sell_price : 0,
                '8' => $value->manufacture->manufacture_name,
                '9' => $value->productGroup->pro_group_name,
                '10' => $value->product_image_url,
                '11' => $value->product_description,
                '12' => $value->user_practise,
                '13' => $value->product_status == 1 ? "Đang kinh doanh" : 'Ngừng kinh doanh',
                '14' => $value->created_at,
                '15' => $value->updated_at,
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
            'SL lỗi',
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
