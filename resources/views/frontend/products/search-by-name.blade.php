@extends('frontend.layouts.app')
@section('title')
    案件登録
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .star-rating {
            display: inline-block;
        }

        .star {
            display: inline-block;
            width: 25px;
            height: 25px;
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="%23ccc" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
        }

        .star.full {
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="%23ffd700" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>');
        }

        .star.half {
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><linearGradient id="half" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="50%" stop-color="%23ffd700"/><stop offset="50%" stop-color="%23ccc"/></linearGradient></defs><path fill="url(%23half)" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>');
        }

        .rating-value {
            font-size: 14px;
            vertical-align: top;
            line-height: 25px;
            margin-left: 5px;
        }
    </style>
@endsection
@section('content')
    <section class="all_search_2">
        <div class="container">
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
                                            <p>メーカー名 : &nbsp;<span class="col1_des">{{ $product->maker->name }}</span></p>
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
                                                        'rating' => $product->longevity,
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
                <div class="read_more wow fadeInUp">
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
                </div>
            @else
                <div class="alert empty-alert">表示するデータがありません。</div>
            @endif
        </div>

    </section>
@endsection
@section('script')
@endsection
