<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'payment_id' => ['required', 'numeric', 'max:3'],
        ];
    }

    public function messages()
    {
        return [
            'payment_id.required' => '支払方法は必須項目です',
            'payment_id.numeric' => '支払方法は選択肢から入力してください',
            'payment_id.max' => '支払方法は選択肢から入力してください',
        ];
    }
}
