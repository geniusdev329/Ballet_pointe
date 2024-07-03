@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<section class="privacy">
    <div class="container">
        <div class="title title_set">
            <h1 class="title_tlt">お知らせ</h1>
            <p class="title_subtlt">- News -</p>
        </div>
        <h1 class="news_ttl">{{ $notification->title }}</h1>
        <div class="des_box">
            {!! isset($notification) ? $notification->html_content : '' !!}
        </div>
    </div>
    <a class="btn" href="{{ route('notification-list') }}">お知らせ一覧に戻る</a>
</section>
@endsection
@section('script')
@endsection
