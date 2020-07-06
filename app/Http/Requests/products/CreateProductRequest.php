<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_avatar' => 'required',
            'product_name' => 'required|unique:products|min:6|max:255',
            'product_amount' => 'required|numeric',
            'product_price' => 'required|numeric',
            'product_price_new' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_avatar.required' => 'Vui lòng chọn hình ảnh',
            'product_name.required' => 'Vui lòng nhập tên sản phẩm',
            'product_name.unique' => 'Tên sản phẩm đã tồn tại',
            'product_name.min' => 'Tên sản phẩm tối thiểu 6 kí tự',
            'product_name.max' => 'Tên sản phẩm tối đa 255 kí tự',
            'product_amount.required' => 'Số lượng bắt buộc nhập',
            'product_amount.numeric' => 'Số lượng bắt buộc kí tự số',
            'product_price.required' => 'Giá sản phẩm không được trống',
            'product_price.numeric' => 'Giá sản phẩm phải là kí tự số',
            'product_price_new.required' => 'Giá thực tế không được trống',
            'product_price_new.numeric' => 'Giá thực tế phải là kí tự số',
            'category_id.required' => 'Chọn danh mục sản phẩm',
            'brand_id' => 'Chọn thương hiệu sản phẩm',
        ];
    }
}
