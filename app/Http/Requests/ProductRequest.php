<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'product_name' => ['required', 'min:6', new Uppercase],
            'product_name' => ['required', 'min:6', function ($attribute, $value, $fail) {
                isUppercase($value, 'Trường :attribute không hợp lệ', $fail);
            }],
            'product_price' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute bắt buộc phải nhập',
            'min' => 'Trường :attribute không được nhỏ hơn :min kí tự',
            'integer' => 'Trường :attribute phải là số',
        ];
    }

    public function attributes()
    {
        return [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm',
        ];
    }

    /**
     * Hàm sử dùng sau khi validate
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add(
                    'msg',
                    'Đã có lỗi xảy ra, Vui lòng kiểm tra lại'
                );
            }
        });
    }

    /**
     * Chạy trước khi validate request
     */
    public function prepareForValidation()
    {
        $this->merge([
            'create_at' => date('Y-m-d M:i:s'),
        ]);
    }

    protected function failedAuthorization()
    {
        // Custom lại message hiện có
        //throw new AuthorizationException('Bạn không có quyền truy cập');

        // Redirect tới trang khác và hiển thị message
        // throw new HttpResponseException(redirect('/create')->with('msg', 'bạn ko có quyền truy cập'));

        throw new HttpResponseException(abort(404));
    }
}
