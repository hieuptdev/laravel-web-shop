<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required|min:4',
            'address' => 'required|min:4',
            'phone' => 'required|min:7'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email Không được để trống!',
            'email.email' => 'Email Không đúng định dạng!',

            'name.required' => 'Họ tên Không được để trống!',
            'name.min' => 'Họ tên Không được nhỏ hơn 4 ký tự!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.min' => 'Số điện thoại không được nhỏ hơn 7 ký tự!',
            'phone.unique' => 'Số điện thoại Đã Tồn tại!',
            'address.required' => 'Địa chỉ không được để trống'
        ];
    }
}
