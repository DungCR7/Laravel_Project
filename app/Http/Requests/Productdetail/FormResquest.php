<?php

namespace App\Http\Requests\Productdetail;

use Illuminate\Foundation\Http\FormRequest;

class FormResquest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'size'=>'required',
           
        ];
    }
    public function messages()
    {
        return[
            'size.required'=> 'Vui lòng nhập tên danh mục',
        ];
    }
}
