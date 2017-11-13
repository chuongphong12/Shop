<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sltParent'=>'required',
            'txtDescription'=>'required',
            'txtUnit_price'=>'required',
            'txtPromotion_price'=>'required',
            'txtUnit'=>'required',
            'txtProductName'=>'required|unique:products,name',
            'fImages'=>'required|image'
        ];
    }
    public function messages(){
        return[
            'sltParent.required'=>'Hãy lựa chọn danh mục sản phẩm !',
            'txtProductName.required'=>'Nhập vào tên sản phẩm . ',
            'txtProductName.unique'=>'Tên sản phẩm đã tồn tại .',
            'txtDescription.required'=>'Nhập vào mô tả . ',
            'txtUnit_price.required' => "Hãy nhập vào giá niêm yết .",
            'txtPromotion_price.required' => "Hãy nhập vào giá khuyến mãi .",
            'txtUnit.required' => "Hãy nhập vào đơn vị .",
            'fImages.required'=>'Bạn chưa chọn hình ảnh !',
            'fImages.image'=>'Hình ảnh không đúng định dạng .'
        ];
    }
}
