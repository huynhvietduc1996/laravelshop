<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmdminAttributeRequest extends FormRequest
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
            'atb_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'atb_name.required' => 'Dữ liệu không được để trống',
        ];
    }
}
