@extends('frontend.layouts.app')
@section('title')
    案件登録
@endsection
@section('css')
@endsection
@section('content')
    <section class="p-fv">
    </section>
    <section class="privacy">
        <div class="container">
            <div class="title title_set">
                <h1 class="title_tlt">利用規約</h1>
                <p class="title_subtlt">- Terms of use -</p>
            </div>
            <div class="des_box">
                @if (isset($tou))
                    {!! $tou->html_content !!}
                @else
                    <div class="alert empty-alert">表示するデータがありません。</div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
