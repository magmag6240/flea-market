<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'メールアドレスは必須項目です',
            'email.string' => 'メールアドレスは文字列で入力してください',
            'email.email' => '有効なメールアドレス形式で入力してください',
            'email.max' => 'メールアドレスは255文字以下で入力してください',
            'password.required' => 'パスワードは必須項目です',
            'password.string' => 'パスワードは文字列で入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは255文字以下で入力してください',
        ];
    }
}
