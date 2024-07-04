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

        /* rating */
        .rating-css div {
            color: #ffe400;
            font-size: 15px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 5px 0;
        }

        .rating-css input {
            display: none;
        }

        .rating-css input+label {
            font-size: 30px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }

        .rating-css input:checked+label~label {
            color: #b4afaf;
        }

        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
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
                                <p class="quality">履き心地</p>
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
                                @include('partials.star-rating', ['rating' => $product->longavity])
                            </div>
                        </div>
                        <div id="reviewModalBtn" class="des">
                            <p class="text">この製品の口コミを
                                投稿する</p>
                        </div>
                        <div>
                            <a href="javascript:favoriteBtn({{ $product->id }})"><button class="addfav_btn">この商品を</br>お気に入りに登録する</button></i></a>
                        </div>
                    </div>
                </div>
                <div class="search_1">
                    @foreach ($product->reviews as $product_review)
                        @if ($product_review->status == 1)
                            <div class="search_1_modal wow fadeInUp">
                                <div class="user">
                                    <div class="user_avatar">
                                        <img src="/assets/img/user1.png" alt="" class="">
                                    </div>
                                    <div class="user_setting">
                                        <div class="part_setting">
                                            <div class="row1">
                                                <p>ニックネーム :&nbsp;
                                                        <span class="row1_des">{{ $product_review->user->nickname . 'さん' }}</span>
                                                </p>
                                                <p>年齢 :&nbsp;
                                                    <span class="row1_des">{{ $product_review->user->age }}</span>
                                                    代
                                                </p>
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
                                <div style="text-align: right;font-size: 12px">{{ $product_review->created_at->format('Y年n月j日')}} 投稿済み</div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <div id="submitReviewModal" class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <div class="modal_title">
                    <h1 class="modal_title_tlt">{{ $product->name }}</h1>
                    <p class="modal_title_subtlt">- Chacott Swanilda -</p>
                </div>
                <form id="submitReviewForm" action="{{ route('add-review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="tab_search_ttl">▼以下を入力してください</div>
                    <div class="tab_search">
                        <div class="tab_search_part1">
                            <div class="tab2_part1">
                                <p class="tlt_2">購入サイズ : &nbsp;&nbsp;</p>
                                <input type="text" class="in_2" name="purchase_size">
                                <p class="tlt_2">(cm)</p>
                            </div>
                            <div class="tab2_part1">
                                <p class="tlt_2">ワイズ<span class="que_sym"><img src="/assets/img/question.png" class="que_sym"alt="">
                                    <span class="tooltip hide">
                                        ご自身の足の形を見て、以下を選択してください<br>
                                        エジプト型；親指が最も長い方<br>
                                        ギリシャ型：人差し指か中指が最も長い方<br>
                                        スクエア型：親指から薬指までの長さがほぼ同じの方                                    
                                    </span></span> : &nbsp;&nbsp;</p>
                                <input type="text" class="in_2" name="purchase_width">
                            </div>
                            <div class="tab2_part1">
                                <p class="tlt_2">シャンク<span class="que_sym"><img src="/assets/img/question.png" class="que_sym"alt="">
                                    <span class="tooltip hide">
                                        ご自身の足の形を見て、以下を選択してください<br>
                                        エジプト型；親指が最も長い方<br>
                                        ギリシャ型：人差し指か中指が最も長い方<br>
                                        スクエア型：親指から薬指までの長さがほぼ同じの方                                    
                                    </span></span> : &nbsp;&nbsp;</p>
                                <input type="text" class="in_2" name="shank">
                            </div>
                        </div>
                        <div class="tab_search_ttl">▼以下を5段階評価で選択してください</div>
                        <div class="tab_search_part2">
                            <div class="tab2_part2">
                                <p class="tlt_2">総合満足度 : &nbsp;&nbsp;</p>
                                <div class="rating-css">
                                    <div class="star-icon">
                                        <input type="radio" value="1" name="average_satisfaction" checked
                                            id="avg_rating1">
                                        <label for="avg_rating1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="average_satisfaction"
                                            id="avg_rating2">
                                        <label for="avg_rating2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="average_satisfaction"
                                            id="avg_rating3">
                                        <label for="avg_rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="average_satisfaction"
                                            id="avg_rating4">
                                        <label for="avg_rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="average_satisfaction"
                                            id="avg_rating5">
                                        <label for="avg_rating5" class="fa fa-star"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_search_part2">
                        <div class="tab2_part2">
                            <p class="tlt_2">履き心地: </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="comfort" checked id="comfort_rating1">
                                    <label for="comfort_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="comfort" id="comfort_rating2">
                                    <label for="comfort_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="comfort" id="comfort_rating3">
                                    <label for="comfort_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="comfort" id="comfort_rating4">
                                    <label for="comfort_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="comfort" id="comfort_rating5">
                                    <label for="comfort_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                        <div class="tab2_part2">
                            <p class="tlt_2">音の静かさ: </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="quietness" checked
                                        id="quietness_rating1">
                                    <label for="quietness_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="quietness" id="quietness_rating2">
                                    <label for="quietness_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="quietness" id="quietness_rating3">
                                    <label for="quietness_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="quietness" id="quietness_rating4">
                                    <label for="quietness_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="quietness" id="quietness_rating5">
                                    <label for="quietness_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_search_part2">
                        <div class="tab2_part2">
                            <p class="tlt_2">軽 さ : </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="lightness" checked
                                        id="lightness_rating1">
                                    <label for="lightness_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="lightness" id="lightness_rating2">
                                    <label for="lightness_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="lightness" id="lightness_rating3">
                                    <label for="lightness_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="lightness" id="lightness_rating4">
                                    <label for="lightness_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="lightness" id="lightness_rating5">
                                    <label for="lightness_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                        <div class="tab2_part2">
                            <p class="tlt_2">安定性: </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="stability" checked
                                        id="stability_rating1">
                                    <label for="stability_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="stability" id="stability_rating2">
                                    <label for="stability_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="stability" id="stability_rating3">
                                    <label for="stability_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="stability" id="stability_rating4">
                                    <label for="stability_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="stability" id="stability_rating5">
                                    <label for="stability_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                        <div class="tab2_part2">
                            <p class="tlt_2">持ちの良さ: </p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="longavity" checked
                                        id="longevity_rating1">
                                    <label for="longevity_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="longavity" id="longevity_rating2">
                                    <label for="longevity_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="longavity" id="longevity_rating3">
                                    <label for="longevity_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="longavity" id="longevity_rating4">
                                    <label for="longevity_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="longavity" id="longevity_rating5">
                                    <label for="longevity_rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_search_part3">
                        <textarea name="review_text" id="review_text" cols="30" rows="10" class="in_des"></textarea>
                    </div>
                    <button type="submit" id="submitBtn" class="btn">投稿する</button>
                </form>
            </div>
        </div>

    </div>
    <style>
        .addfav_btn {
            width: 185px;
            height: 65px;
            border: 1px #FF9293 solid;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            cursor: pointer;
            font-size: 15px;
            line-height: 22px;
            text-align: center;
            background: white;
            color: #FF9293
        }
        .addfav_btn:hover {
            background: #ffe7e8
        }
        .tab_search_ttl {
            color: #FF9293;
            font-weight: 500;
            font-size: 20px
        }
    </style>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var submitReviewModal = document.getElementById("submitReviewModal");
        var reviewModalBtn = document.getElementById("reviewModalBtn");
    
        // When the user clicks the button, open the modal
        if (submitReviewModal && reviewModalBtn) {
            reviewModalBtn.addEventListener('click', function(event) {
                submitReviewModal.style.display = "block";
            });
        }
    
        if (submitReviewModal) {
            var closeBtn = submitReviewModal.querySelector('.close');
            closeBtn.onclick = function () {
                submitReviewModal.style.display = "none";
            }
        }

        var submitReviewForm = document.getElementById("submitReviewForm");
        if (submitReviewForm) {
            var submitBtn = submitReviewForm.querySelector('#submitBtn');
            submitBtn.addEventListener('click', function(event) {
                event.preventDefault();
               
                var purchase_size = submitReviewForm.querySelector('input[name="purchase_size"]');
                if(purchase_size.value == '') {
                    toastr.error('Please input the purchase_size.');
                    return false;
                }
                var purchase_width = submitReviewForm.querySelector('input[name="purchase_width"]');
                if(purchase_width.value == '') {
                    toastr.error('Please input the purchase_width.');
                    return false;
                }
                var shank = submitReviewForm.querySelector('input[name="shank"]');
                if(shank.value == '') {
                    toastr.error('Please input the shank.');
                    return false;
                }
                var review_text = submitReviewForm.querySelector('#review_text');
                if(review_text.value == '') {
                    toastr.error('Please input the content.');
                    return false;
                }
                submitReviewForm.submit();
            });
        }
    
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == submitReviewModal) {
                submitReviewModal.style.display = "none";
            }
        }
    </script>
    <script>
        const ctx = document.getElementById('productChart').getContext('2d');
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['履き心地', '音の静かさ', '軽 さ', '安定性', '持ちの良さ'],
                datasets: [{
                    label: '商品ロコミ',
                    data: [
                        {{ $product->comfort }},
                        {{ $product->quietness }},
                        {{ $product->lightness }},
                        {{ $product->stability }},
                        {{ $product->longavity }}
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

        function favoriteBtn(product_id) {
            $.ajax({
            url: "{{ route('add-favorites') }}",
            method: "POST",
            data: {
                'product_id': product_id,
                _token : $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function(response) {
                console.log(response.success);
                if (response.success) {
                    $('#result').html('Form submitted successfully: ' + response.message);
                    toastr.success(response.message)
                } else {
                    toastr.error("response.message")
                }
            },
            error: function(xhr, status, error) {
                console.log('error');
            }
        });
        }
    </script>
@endsection
