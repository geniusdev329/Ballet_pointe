@extends('frontend.layouts.app')
@section('title')
    案件登録
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
                <form action="" method="POST">
                    @csrf
                    <div class="des__part1">
                        <p class="text">氏名&nbsp;<span class="sub">[必須]</span></p>
                        <input type="text" class="in_put">
                    </div>
                    <div class="des__part2">
                        <p class="text">メールアドレス&nbsp;<span class="sub">[必須]</span></p>
                        <input type="text" class="in_put">
                    </div>
                    <div class="des__part3">
                        <p class="text">内容&nbsp;<span class="sub">[必須]</span></p>
                        <textarea name="contact" id="" cols="30" rows="10" class="in_put"></textarea>
                    </div>
                    <div class="read_more">
                        <div class="btn1">
                            <button type="button" class="btn__title">送信する</button>
                        </div>
                    </div>
                </form>
                <div class="contact__tab">
                    <a href="{{ route('welcome') }}" class="tab_title">ホームへ</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
