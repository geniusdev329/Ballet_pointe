@extends('frontend.layouts.app')
@section('title')
    マイポワント
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
<section class="all_search">
    <div class="container fixed-height">
            <h3 class="search_ttl">検索結果</h3>
            @if (count($product_reviews) > 0)
                <div class="search_1">
                    @foreach ($product_reviews as $product_review)
                        <a class="search_1_modal wow fadeInUp" href="{{ route('products.detail', $product_review->product_id) }}">
                            <div class="user">
                                <div class="user_avatar">
                                    <img src="/assets/img/user1.png" alt="" class="">
                                </div>
                                <div class="user_setting">
                                    <div class="part_setting">
                                        <div class="row1">
                                            <p>ニックネーム : &nbsp;<span class="row1_des"></span></p>
                                            <p><span
                                                    class="row1_des">{{ $product_review->user->nickname . 'さん' }}</span>
                                            </p>
                                            <p>年齢 : &nbsp;<span
                                                    class="row1_des">{{ $product_review->user->age }}</span>&nbsp;代</p>
                                        </div>
                                        <div class="cols">
                                            <div class="col1">
                                                <p>バレエ : &nbsp;<span
                                                        class="col1_des">{{ $product_review->user->ballet_career }}年</span>
                                                </p>
                                                <p>足の形 : &nbsp;<span
                                                        class="col1_des">{{ $product_review->user->foot_shape }}</span>
                                                </p>
                                            </div>
                                            <div class="col1">
                                                <p>レッスン頻度：&nbsp;<span class="col1_des">週&nbsp;2</span>回</p>
                                                <p>足幅 : &nbsp;<span
                                                        class="col1_des">{{ $product_review->user->foot_width }}</span>
                                                </p>
                                            </div>
                                            <div class="col1">
                                                <p>足の大きさ : &nbsp;<span class="col1_des">24</span>(cm)</p>
                                                <p>甲の高さ : &nbsp;<span
                                                        class="col1_des">{{ $product_review->user->foot_width }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="setting">
                                <div class="setting_des">
                                    <div class="row1">
                                        <div class="col1">
                                            <p>メーカー名 : &nbsp;<span
                                                    class="col1_des">{{ $product_review->product->maker->name }}</span>
                                            </p>
                                            <p>購入サイズ : &nbsp;<span
                                                    class="col1_des">{{ $product_review->purchase_size }}</span>&nbsp;(cm)
                                            </p>

                                        </div>
                                        <div class="col1">
                                            <p>製品名 : &nbsp;<span
                                                    class="col1_des">{{ $product_review->product->name }}</span></p>
                                            <p>ワイズ : &nbsp;<span
                                                    class="col1_des">{{ $product_review->purchase_width }}</span></p>

                                        </div>
                                    </div>
                                    <div class="row2">
                                        <div class="row2_part">
                                            <div class="star-rating-group">
                                                <p class="star-lavel">総合満足度: </p>
                                                @include('partials.star-rating', [
                                                    'rating' => $product_review->average_satisfaction,
                                                ])
                                            </div>
                                        </div>
                                        <div class="row2_part">
                                            <div class="star-rating-group">
                                                <p class="star-lavel">履き心地: </p>
                                                @include('partials.star-rating', [
                                                    'rating' => $product_review->comfort,
                                                ])
                                            </div>
                                            <div class="star-rating-group">
                                                <p class="star-lavel">音の静かさ: </p>
                                                @include('partials.star-rating', [
                                                    'rating' => $product_review->quietness,
                                                ])
                                            </div>
                                        </div>
                                        <div class="row2_part">
                                            <div class="star-rating-group">
                                                <p class="star-lavel">軽 さ: </p>
                                                @include('partials.star-rating', [
                                                    'rating' => $product_review->lightness,
                                                ])
                                            </div>
                                            <div class="star-rating-group">
                                                <p class="star-lavel">安定性: </p>
                                                @include('partials.star-rating', [
                                                    'rating' => $product_review->stability,
                                                ])
                                            </div>
                                            <div class="star-rating-group">
                                                <p class="star-lavel">持ちの良さ: </p>
                                                @include('partials.star-rating', [
                                                    'rating' => $product_review->longavity,
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review">
                                <p class="review_quote">"</p>
                                <p class="review_quote1">"</p>
                                <p class="review__describe">{{ $product_review->content }}</p>
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
                <div class="alert empty-alert">表示するデータがありません。</div>
            @endif
        </div>
    </section>


@endsection
@section('script')
@endsection
