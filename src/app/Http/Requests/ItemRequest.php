<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:191'],
            'image_url' => ['required'],
            'condition_id' => ['required', 'numeric', 'max:6'],
            'category_id' => ['required', 'numeric', 'max:14'],
            'brand_name' => ['nullable', 'string', 'max:191'],
            'price' => ['required', 'numeric'],
            'item_detail' => ['required', 'string', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名は必須項目です',
            'name.string' => '商品名は文字列で入力してください',
            'name.max' => '商品名は191文字以内で入力してください',
            'image_url.required' => 'プロフィール画像は必須項目です',
            'condition_id.required' => '商品の状態は必須項目です',
            'condition_id.numeric' => '商品の状態は選択肢から入力してください',
            'condition_id.max' => '商品の状態は選択肢から入力してください',
            'category_id.required' => 'カテゴリーは必須項目です',
            'category_id.numeric' => 'カテゴリーは選択肢から入力してください',
            'category_id.max' => 'カテゴリーは選択肢から入力してください',
            'brand_name.string' => 'ブランド名は文字列で入力してください',
            'brand_name.max' => 'ブランド名は191文字以内で入力してください',
            'price.required' => '販売価格は必須項目です',
            'price.numeric' => '販売価格は数字で入力してください',
            'item_detail.required' => '商品の説明は必須項目です',
            'item_detail.string' => '商品の説明は文字列で入力してください',
            'item_detail.max' => '商品の説明は255文字以内で入力してください'
        ];
    }
}
