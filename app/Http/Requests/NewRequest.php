<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class NewRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'menu_id' => 'required',
            'image_path' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Không được để trống!',
            'content.required' => 'Không được để trống!',
            'menu_id.required' => 'Không được để trống!',
            'image_path.required' => 'Không được để trống!'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([

            'message'   => 'Lỗi Nhập Dữ Liệu',
            'data'      => $validator->errors()
        ]));

    }
}
