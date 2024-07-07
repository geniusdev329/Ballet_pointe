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
                <div class="contact_desc">お問い合わせ内容を確認してください</div>
                <form action="{{ route('contact.confirm') }}" method="POST"
                    class="des_contact_us {{ $errors->any() ? 'was-validated' : '' }}">
                    @csrf
                    <div class="des__part2">
                        <p class="text">氏名&nbsp;<span class="sub">[必須]</span></p>
                        <p class="text">{{ $request->name}}</p>
                    </div>
                    <div class="des__part2">
                        <p class="text">メールアドレス&nbsp;<span class="sub">[必須]</span></p>
                        <p class="text">{{ $request->email}}
                    </div>
                    <div class="des__part3">
                        <p class="text">内容&nbsp;<span class="sub">[必須]</span></p>
                        <textarea readonly name="content" cols="30" rows="10" class="in_put_1">{{ $request->content}}</textarea>
                    </div>
                    <div class="action-tool">
                        <button type="submit" class="btn">送信する</button>
                    </div>
                </form>
                    <a href="{{ route('welcome') }}" class="return_home">ホームへ</a>
            </div>
        </div>
    </section>
    <style>
        .contact_desc {
            font-size: 22px;
        }
        @media screen and (max-width: 767px) {
            .contact_desc {
                font-size: 18px;
            }
        }
    </style>
@endsection
@section('script')
@endsection
