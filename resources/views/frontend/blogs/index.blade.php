@extends('frontend.layouts.app')
@section('title')
    案件登録
@endsection
@section('css')
@endsection
@section('content')
    <section class="pointe">
        <div class="container">
            <div class="title title_set">
                <h1 class="title_tlt wow fadeInUp">バレリーナのマイポワント</h1>
                <p class="title_subtlt wow fadeInUp">- Ballerina's pointe -</p>
                <p class="title_pointe_des wow fadeInUp">ダンサーの数だけ存在するトゥシューズのストーリー。<br>
                    ダンサーの皆さんに行ったインタビューをお届けします。</p>
            </div>
            <div class="all_shoes">
                @foreach ($blogs as $blog)
                    <a href="{{ route('blogs.detail', $blog->id) }}">
                        <div class="com_shoes wow fadeIn">
                            <img src="{{ URL::asset('images/blogs/' . $blog->image) }}" class="com_shoes__shoes"
                                alt="">
                            <div class="com_shoes__describe">
                                <p class="date">{{ $blog->created_at->format('Y年 m月 d日') }}</p>
                                <p class="text">{{ $blog->title }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="read_more wow fadeInUp">
            <div class="btn">
                <img src="/assets/img/arrow.png" alt="" class="btn_arrow_rotate">
                <p class="btn__title">前へ戻る</p>
            </div>
            <div class="btn">
                <p class="btn__title">次へ進む</p>
                <img src="/assets/img/arrow.png" alt="">
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
