<?php

namespace Furbook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatRequest extends FormRequest
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
            'name' => 'required|min:3|max:6',
            'date_of_birth' => 'required|date'
        ];
    }

    public function messages()
    {
      return [
        'name.required' => 'Tên không được để trống',
        'name.min' => 'Tên không được nhỏ hơn 3 kí tự',
        'name.max' => 'Tên không được lớn hơn 6 kí tự',
        'date_of_birth.required' => 'Ngày sinh không được để trống'
      ];
    }
}
