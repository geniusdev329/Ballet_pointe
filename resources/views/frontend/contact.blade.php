@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
@endsection
@section('content')
    <section class="contact">
        <div class="contact_wrap">
            <div class="title title_set">
                <h1 class="title_tlt">問い合わせ</h1>
                <p class="title_subtlt">- Contact us -</p>
            </div>
            <div class="des">
                <div class="contact_desc">ご質問やご要望等をご希望の方は以下をご入力の上、送信して下さい。</div>
                <form action="{{ route('contact.submit') }}" method="POST"
                    class="des_contact_us {{ $errors->any() ? 'was-validated' : '' }}">
                    @csrf
                    <div class="des__part2">
                        <p class="text">氏名&nbsp;<span class="sub">[必須]</span></p>
                        <input type="text" class="in_put" name="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="des__part2">
                        <p class="text">メールアドレス&nbsp;<span class="sub">[必須]</span></p>
                        <input type="email" class="in_put" name="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="des__part3">
                        <p class="text">内容&nbsp;<span class="sub">[必須]</span></p>
                        <textarea name="contact" id="content" name="content" cols="30" rows="10" class="in_put"></textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="action-tool">
                        <button type="submit" class="btn">送信する</button>
                    </div>
                </form>
                <div class="contact__tab">
                    <a href="{{ route('welcome') }}" class="tab_title">ホームへ</a>
                </div>
            </div>
        </div>
    </section>
    <style>
        .contact_desc {
            font-size: 18px;
        }
    </style>
@endsection
@section('script')
@endsection
