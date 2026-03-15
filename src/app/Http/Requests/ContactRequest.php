<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|string|max:8',
            'last_name' => 'required|string|max:8',
            'gender' => 'required',
            'email' => 'required|email',
            'tel_1' => 'required|numeric|digits_between:1,5',
            'tel_2' => 'required|numeric|digits_between:1,5',
            'tel_3' => 'required|numeric|digits_between:1,5',
            'address' => 'required',
            'category_id' => 'required',
            'detail' => 'required|max:120',
        ];
    }

    public function messages(){
        return[
            'last_name.required' => '苗字を入力してください',
            'last_name.string' => '苗字を文字列で入力してください',
            'last_name.max' => '苗字を8文字以内で入力してください',
            'first_name.required' => '名前を入力してください',
            'first_name.string' => '名前を文字列で入力してください',
            'first_name.max' => '名前を8文字以内で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください',
            'tel_1.required' => ' ',
            'tel_1.numeric' => ' ',
            'tel_1.digits_between' => ' ',
            'tel_2.required' => ' ',
            'tel_2.numeric' => ' ',
            'tel_2.digits_between' => ' ',
            'tel_3.required' => ' ',
            'tel_3.numeric' => ' ',
            'tel_3.digits_between' => ' ',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせの内容を入力してください',
            'detail.max' => 'お問い合わせの内容を120文字以内で入力してください',
        ];
    }
}
