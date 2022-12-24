<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
            'p_category_id' => 'required',
            'p_name'        => 'required|max:255|min:3',
            'p_price'       => 'required',
            'p_description' => 'required',
            'p_content'     => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'p_name.required' => 'Dữ liệu không được để trống',
            'p_name.max'      => 'Dữ liệu không vượt quá 255 kí tự',
            'p_name.min'      => 'Dữ liệu tối thiểu 3 kí tự',
            'p_price.required' => 'Dữ liệu không được để trống',
            'p_description.required' => 'Dữ liệu không được để trống',
            'p_content.required' => 'Dữ liệu không được để trống',
            'p_category_id.required' => 'Dữ liệu không được để trống'
        ];
    }
}
