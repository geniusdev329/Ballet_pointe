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
    <section class="ballet_pointe">
        <div class="container">
            <div class="title title_set">
                <h1 class="title_tlt wow fadeInUp">{{ $product->name }}</h1>
                <p class="title_subtlt wow fadeInUp">- Ballet pointe -</p>
            </div>
            <div class="ballet">
                <div class="pointe_ballet">
                    <img src="{{ URL::asset('images/products/' . $product->image) }}" alt=""
                        class="pointe_ballet__img wow fadeIn">
                    <div class="pointe_ballet_des">
                        <div class="des_text">
                            {!! $product->html_description !!}
                        </div>
                        <div class="des_btn">
                            <a href="{{ $product->rakuten_link }}">
                                <div class="des_btn_des wow fadeIn">
                                    <p class="text"><span class="text_sub">楽天</span>で<br>
                                        商品を見る</p>
                                </div>
                            </a>
                            <a href="{{ $product->amazon_link }}">
                                <div class="des_btn_des wow fadeIn">
                                    <p class="text"><span class="text_sub">amazon</span>で<br>
                                        商品を見る</p>
                                </div>
                            </a>
                            <a href="{{ $product->yahoo_link }}">
                                <div class="des_btn_des wow fadeIn">
                                    <p class="text"><span class="text_sub">Yahoo</span>Yahooで<br>
                                        商品を見る</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="shoes_chart">
                    <div class="shoes_chart_part1">
                        <div style="width: 500px; height: 500px;">
                            <canvas id="productChart"></canvas>
                        </div>
                    </div>

                    <div class="shoes_chart_des_btn wow fadeInUp">
                        <div class="quality_all">

                            <div class="star-rating-group">
                                <p class="quality">履き心</p>
                                @include('partials.star-rating', ['rating' => $product->comfort])
                            </div>
                            <div class="star-rating-group">
                                <p class="quality">音の静かさ</p>
                                @include('partials.star-rating', ['rating' => $product->quietness])
                            </div>
                            <div class="star-rating-group">
                                <p class="quality">軽 さ</p>
                                @include('partials.star-rating', ['rating' => $product->lightness])
                            </div>
                            <div class="star-rating-group">
                                <p class="quality">安定性</p>
                                @include('partials.star-rating', ['rating' => $product->stability])
                            </div>
                            <div class="star-rating-group">
                                <p class="quality">持ちの良さ</p>
                                @include('partials.star-rating', ['rating' => $product->longevity])
                            </div>
                        </div>
                        <div id="myBtn3" class="des">
                            <p class="text">この製品の口コミを
                                投稿する</p>
                        </div>
                    </div>
                </div>
                <div class="search_1">
                    @foreach ($product->reviews as $product_review)
                        <div class="search_1_modal wow fadeInUp">
                            <div class="user">
                                <div class="user_avatar">
                                    <img src="/assets/img/user1.png" alt="" class="">
                                </div>
                                <div class="user_setting">
                                    <div class="part_setting">
                                        <div class="row1">
                                            <p>ニックネーム : &nbsp;<span class="row1_des"></span></p>
                                            <p><span class="row1_des">{{ $product_review->user->nickname . 'さん' }}</span>
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
                                                        class="col1_des">{{ $product_review->user->foot_shape }}</span></p>
                                            </div>
                                            <div class="col1">
                                                <p>レッスン頻度：&nbsp;<span class="col1_des">週&nbsp;2</span>回</p>
                                                <p>足幅 : &nbsp;<span
                                                        class="col1_des">{{ $product_review->user->foot_width }}</span></p>
                                            </div>
                                            <div class="col1">
                                                <p>足の大きさ : &nbsp;<span class="col1_des">24</span>(cm)</p>
                                                <p>甲の高さ : &nbsp;<span
                                                        class="col1_des">{{ $product_review->user->foot_width }}</span></p>
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
                                                    class="col1_des">{{ $product_review->product->maker }}</span></p>
                                            <p>製品サイズ : &nbsp;<span
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
                                                <p class="star-lavel">履き心: </p>
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
                                                    'rating' => $product_review->longevity,
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
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="read_more wow fadeIn">
                <div class="btn">
                    <p class="btn__title">
                        一覧を見る&
                    </p>
                    <img src="/assets/img/arrow.png" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('productChart').getContext('2d');
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['履き心', '音の静かさ', '軽 さ', '安定性', '持ちの良さ'],
                datasets: [{
                    label: '商品レビュー',
                    data: [
                        {{ $product->comfort }},
                        {{ $product->quietness }},
                        {{ $product->lightness }},
                        {{ $product->stability }},
                        {{ $product->longevity }}
                    ],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }]
            },
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                },
                scales: {
                    r: {
                        angleLines: {
                            display: false
                        },
                        suggestedMin: 0,
                        suggestedMax: 5
                    }
                }
            }
        });
    </script>
@endsection
