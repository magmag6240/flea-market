<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'image_url' => ['required'],
            'user_name' => ['required', 'string', 'max:191'],
            'postcode' => ['required', 'string', 'max:8'],
            'address' => ['required', 'string', 'max:191'],
            'building' => ['nullable', 'string', 'max:191']
        ];
    }

    public function messages()
    {
        return [
            'image_url.required' => 'プロフィール画像は必須項目です',
            'user_name.required' => 'ユーザー名は必須項目です',
            'user_name.string' => 'ユーザー名は文字列で入力してください',
            'user_name.max' => 'ユーザー名は191文字以内で入力してください',
            'postcode.required' => '郵便番号は必須項目です',
            'postcode.string' => '郵便番号は文字列で入力してください',
            'postcode.max' => '郵便番号はハイフンありの8文字で入力してください',
            'address.required' => '住所は必須項目です',
            'address.string' => '住所は文字列で入力してください',
            'address.max' => '住所は191文字以内で入力してください',
            'building.string' => '建物名は文字列で入力してください',
            'building.max' => '建物名は191文字以内で入力してください'
        ];
    }
}
