@extends('frontend.layouts.app')
@section('title')
    案件登録
@endsection
@section('css')
@endsection
@section('content')
    <section class="p-login">
        <div class="p-container">
            <h3 class="p-login__ttl">
                ログイン
            </h3>
            <form id="loginFrom" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="p-login__content">
                    <div class="login-item">
                        <p class="login-item__label">
                            メールアドレス
                        </p>
                        <input type="email" class="input" name="email" placeholder="">
                    </div>
                    <div class="login-item">
                        <p class="login-item__label">
                            パスワード 
                        </p>
                        <input type="password" class="input" name="password" placeholder="">
                    </div>
                </div>
                <div class="log_btn">
                    <button type="submit" class="submit">
                        ログイン
                    </button>
                </div>
                <div class="p-register">
                    <p>すでにアカウントをお持ちですか？</p>
                    <a href="{{ route('register') }}" class="p-register_btn">会員登録する</a>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
@endsection
