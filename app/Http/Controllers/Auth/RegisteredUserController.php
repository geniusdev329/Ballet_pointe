<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'nickname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'password_confirmation' => ['required'],
                'gender' => ['required'],
                'age' => ['required'],
                'ballet_career' => ['required'],
                'ballet_level' => ['required'],
                'foot_shape' => ['required'],
                'foot_size' => ['required'],
                'foot_width' => ['required'],
                'foot_height' => ['required'],
                'mail_magazin' => ['required'],
                'tos_confirm' => ['required'],
                'privacy_policy_confirm' => ['required'],
            ],
            [
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
                'password.min' => 'パスワードは8文字以上である必要があります。',
                'password.confirmed' => 'パスワードが一致しません',
                'password_confirmation.required' => 'パスワードの確認を入力してください',
                'gender.required' => '性別を選択してください',
                'age.required' => '年齢を入力してください',
                'ballet_career.required' => 'バレエ歴を入力してください',
                'ballet_level.required' => 'バレエのレベルを選択してください',
                'foot_shape.required' => '足の形を選択してください',
                'foot_size.required' => '足のサイズを入力してください',
                'foot_width.required' => '足幅を選択してください',
                'foot_height.required' => '足の高さを選択してください',
                'mail_magazin.required' => 'メールマガジンの選択をしてください',
                'tos_confirm.required' => '利用規約に同意してください',
                'privacy_policy_confirm.required' => 'プライバシーポリシーに同意してください',
            ]
        );

        $user = User::create([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'ballet_career' => $request->ballet_career,
            'ballet_level' => $request->ballet_level,
            'foot_shape' => $request->foot_shape,
            'foot_size' => $request->foot_size,
            'foot_width' => $request->foot_width,
            'foot_height' => $request->foot_height,
            'mail_magazin' => $request->mail_magazin,
            'tos_confirm' => $request->tos_confirm === 'on' ? 1 : 0, // Convert 'on' to 1 (true) and any other value to 0 (false)
            'privacy_policy_confirm' => $request->privacy_policy_confirm === 'on' ? 1 : 0, // Convert 'on' to 1 (true) and any other value to 0 (false)
            'type' => 0,
        ]);

        event(new Registered($user));

        Auth::login($user);

        $alert = array(
            'message' => auth()->user()->nickname . 'さんのログイン成功',
            'alert-type' => 'success'
        );
        return redirect(route('home', absolute: false))->with($alert);
    }
}
