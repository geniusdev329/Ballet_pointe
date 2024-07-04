<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
       
        return [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'password'=> ['required', 'string','min:6'],
            'password_confirmation'=> ['required'],
            'nickname' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'age' => ['required'],
            'ballet_career' => ['required'],
            'ballet_level' => ['required'],
            'foot_shape' => ['required'],
            'foot_size' => ['required'],
            'foot_width' => ['required'],
            'foot_height' => ['required'],
            'mail_magazin' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'ニックネームを入力してください',
            'nickname.string' => 'ニックネームは文字列で入力してください',
            'nickname.max' => 'ニックネームは255文字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスは文字列で入力してください',
            'email.lowercase' => 'メールアドレスは小文字で入力してください',
            'email.email' => '有効なメールアドレスを入力してください',
            'email.max' => 'メールアドレスは255文字以内で入力してください',
            'email.unique' => 'このメールアドレスは既に使用されています',
            'password.required' => 'パスワードを入力してください',
            'password.string' => 'パスワードは文字列で入力してください',
            'password.min' => 'パスワードは6文字以上で入力してください',
            'password_confirmation.required' => 'パスワード確認を入力してください',
            'gender.required' => '性別を選択してください',
            'age.required' => '年齢を入力してください',
            'age.integer' => '年齢は整数で入力してください',
            'age.min' => '年齢は1以上の値を入力してください',
            'ballet_career.required' => 'バレエ歴を入力してください',
            'ballet_level.required' => 'バレエのレベルを選択してください',
            'foot_shape.required' => '足の形を選択してください',
            'foot_size.required' => '足のサイズを入力してください',
            'foot_width.required' => '足幅を選択してください',
            'foot_height.required' => '足の高さを選択してください',
            'mail_magazin.required' => 'メールマガジンの選択をしてください',
            'mail_magazin.boolean' => 'メールマガジンの選択は真偽値で入力してください',
        ];
    }
}
