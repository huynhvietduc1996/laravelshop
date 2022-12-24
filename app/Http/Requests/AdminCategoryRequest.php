<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
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
            'c_name' => 'required|unique:categories|max:255|min:3',
        ];
    }

    public function messages()
    {
        return [
            'c_name.required' => 'Dữ liệu không được để trống',
            'c_name.unique' => 'Dữ liệu đã tồn tại',
            'c_name.min' => 'Dữ liệu phải nhiều hơn 3 kí tự',
            'c_name.max' => 'Dữ liệu không vượt quá 255 kí tự',
        ];
    }
}
