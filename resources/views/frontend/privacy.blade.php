@extends('frontend.layouts.app')
@section('title')
    案件登録
@endsection
@section('css')
@endsection
@section('content')
    <div class="container">
        <div class="title title_set">
            <h1 class="title_tlt">プライバシー</h1>
            <p class="title_subtlt">- Privacy -</p>
        </div>
        <div class="content-border privacy-empty-height">
            @if (isset($privacy_policy))
                {!! $privacy_policy->html_content !!}
            @else
                <div class="alert empty-alert">表示するデータがありません。</div>
            @endif
        </div>
    </div>
@endsection
@section('script')
@endsection
