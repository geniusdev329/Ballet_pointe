@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    </style>
@endsection
@section('content')
    <section class="all_search_2">
        <div class="container fixed-height">
            <h3 class="search_ttl">検索結果</h3>
            @if (count($products) > 0)
                <div class="search_2">
                    @foreach ($products as $product)
                        <a href="{{ route('products.detail', $product->id) }}">
                            <div class="search_2_modal wow fadeInUp">
                                <div class="user">
                                    <div class="user_avatar">
                                        <img src="{{ URL::asset('images/products/' . $product->image) }}" alt=""
                                            class="">
                                    </div>
                                    <div class="user_setting">
                                        <div class="col1">
                                            <div class="col1" style="gap: 30px">
                                                <p> 製品名: &nbsp;<span class="col1_des">{{ $product->name }}</span></p>
                                                <p>メーカー名 : &nbsp;<span class="col1_des">{{ $product->maker->name }}</span></p>
                                            </div>
                                            <p>口コミ件数 &nbsp;&nbsp;<span
                                                    class="col1_des">{{ $product->reviews()->count() }}</span>(件)</p>
                                        </div>
                                        <div class="col1_2">
                                            <p>総合満足度 : &nbsp;
                                                <span class="">
                                                    @include('partials.star-rating', [
                                                        'rating' => $product->average_satisfaction,
                                                    ])
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col1_3">
                                            <p>履き心地 : &nbsp;
                                                @include('partials.star-rating', [
                                                    'rating' => $product->comfort,
                                                ])
                                            </p>
                                            <p>音の静かさ : &nbsp;
                                                <span class="">
                                                    @include('partials.star-rating', [
                                                        'rating' => $product->quietness,
                                                    ])
                                                </span>
                                            </p>
                                            <p>軽さ : &nbsp;
                                                <span class="">
                                                    @include('partials.star-rating', [
                                                        'rating' => $product->lightness,
                                                    ])
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col1_3">
                                            <p>安定性 : &nbsp;
                                                <span class="">
                                                    @include('partials.star-rating', [
                                                        'rating' => $product->stability,
                                                    ])
                                                </span>
                                            </p>
                                            <p>持ちの良さ : &nbsp;
                                                <span class="">
                                                    @include('partials.star-rating', [
                                                        'rating' => $product->longavity,
                                                    ])
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                {{-- <div class="read_more wow fadeInUp">
                    <div class="btn">
                        <img src="./assets/img/arrow.png" alt="" class="btn_arrow_rotate">
                        <p class="btn__title">
                            前へ戻る
                        </p>
                    </div>
                    <div class="btn">
                        <p class="btn__title">
                            次へ進む
                        </p>
                        <img src="./assets/img/arrow.png" alt="">
                    </div>
                </div> --}}
            @else
                <div class="alert empty-alert">投稿がまだありません。</div>
            @endif
        </div>

    </section>
@endsection
@section('script')
@endsection
