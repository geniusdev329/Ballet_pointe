@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
@endsection
@section('content')
    <section class="p-login">
        <div class="p-container">
            <h3 class="p-login__ttl">
                ログイン
            </h3>
            <form id="loginFrom" action="{{ route('login') }}" method="POST" class="was-validated">
                @csrf
                <div class="p-login__content">
                    <div class="login-item">
                        <p class="login-item__label">
                            メールアドレス
                        </p>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="login-item">
                        <p class="login-item__label">
                            パスワード
                        </p>
                        <div class="form-group">
                            <input type="password" id="pass" name="password" class="form-control">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
