@extends('frontend.layouts.app')
@section('title')
マイポワント
@endsection
@section('css')
@endsection
@section('content')
<section class="ballet_pointe_des">
    <div class="ballet_pointe_des_wrap">
        <div class="title title_set">
            <h1 class="title_tlt wow fadeInUp">バレリーナのマイポワント</h1>
            <p class="title_subtlt wow fadeInUp">- Ballerina's pointe -</p>
        </div>
        <div class="des">
            <div class="blog">
                <div class="blog_title">
                    <p class="blog_title_tlt wow fadeInUp">{{ $blog->title }}</p>
                </div>
                <p class="date wow fadeInUp">{{ $blog->updated_at->format('Y年 n月 j日') }} 更新</p>
                <img src="{{ URL::asset('images/blogs/' . $blog->image) }}" alt="" class="blog_img wow fadeIn">
            </div>
            <div class="que_all">
                <p class="que_des wow fadeIn">{!! $blog->html_content !!}</p>
            </div>
            <a class="btn" href="{{ route('blogs') }}">一覧に戻る</a>
        </div>
    </div>
</section>
@endsection
@section('script')
@endsection