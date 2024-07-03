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
    <section class="infor_setting">
        <div class="all_search">
            <div class="container">
                <div class="tabs">
                    <div data-tab-target="#tab1Content" class="tab_rad tab1 active">プロフィール編集</div>
                    <div data-tab-target="#tab2Content" class="tab_rad tab2">投稿一覧</div>
                    <div data-tab-target="#tab3Content" class="tab_rad1 tab3">お気に入り商品一覧</div>
                </div>
                <div id="tab1Content" data-tab-content class="tab-content active">
                    <form id="profileForm" action="{{ route('profile.update', $user->id) }}" method="POST"
                        class="was-validated">
                        @csrf
                        @method('PATCH')
                        <div class="my_infor_pc_wrap">
                            <div class="des_pc">
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">メールアドレス</p>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email"
                                                value="{{ isset($user) ? $user->email : old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                {{-- <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">パスワード</p>
                                        <div class="form-group">
                                            <input type="password" id="pass" name="password" maxlength="8"
                                                class="form-control">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">パスワード<span class="sub">(確認用）</span></p>
                                        <div class="form-group">
                                            <input type="password" id="pass" name="password_confirmation"
                                                class="form-control">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">表示ニックネーム</p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nickname"
                                                value="{{ isset($user) ? $user->nickname : old('nickname') }}">
                                            @error('nickname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">年 齢</p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" id="age_30"
                                                            name="age" value="30"
                                                            {{ (isset($user) && $user->age == '30') || old('age') == '30' ? 'checked' : '' }}>
                                                        <p class="des_tlt">30代</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" id="age_70"
                                                            name="age" value="70"
                                                            {{ (isset($user) && $user->age == '70') || old('age') == '70' ? 'checked' : '' }}>
                                                        <p class="des_tlt">70歳以上</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('age')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">性 別</p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="gender"
                                                            value="女性"
                                                            {{ (isset($user) && $user->gender == '女性') || old('gender') == '女性' ? 'checked' : '' }}>
                                                        <p class="des_tlt">女性</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="gender"
                                                            value="男性"
                                                            {{ (isset($user) && $user->gender == '男性') || old('gender') == '男性' ? 'checked' : '' }}>
                                                        <p class="des_tlt">男性</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="gender"
                                                            value="回答しない"
                                                            {{ (isset($user) && $user->gender == '回答しない') || old('gender') == '回答しない' ? 'checked' : '' }}>
                                                        <p class="des_tlt">回答しない</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">バレエ歴</p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                <input type="text" class="form-control_1" placeholder="20"
                                                    name="ballet_career"
                                                    value="{{ isset($user) ? $user->ballet_career : old('ballet_career') }}">
                                                <p class="label_input1">年</p>
                                            </div>
                                            @error('ballet_career')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">バレエのレベル<img src="./assets/img/question.png" alt=""
                                                class="que_sym"></p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="ballet_level"
                                                            value="入門～初級者"
                                                            {{ (isset($user) && $user->ballet_level == '入門～初級者') || old('ballet_level') == '入門～初級者' ? 'checked' : '' }}>
                                                        <p class="des_tlt">入門～初級者</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="ballet_level"
                                                            value="初級～中級者"
                                                            {{ (isset($user) && $user->ballet_level == '初級～中級者') || old('ballet_level') == '初級～中級者' ? 'checked' : '' }}>
                                                        <p class="des_tlt">初級～中級者</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="ballet_level"
                                                            value="中級～上級者"
                                                            {{ (isset($user) && $user->ballet_level == '中級～上級者') || old('ballet_level') == '中級～上級者' ? 'checked' : '' }}>
                                                        <p class="des_tlt">中級～上級者</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="ballet_level"
                                                            value="プロレベル"
                                                            {{ (isset($user) && $user->ballet_level == 'プロレベル') || old('ballet_level') == 'プロレベル' ? 'checked' : '' }}>
                                                        <p class="des_tlt">プロレベル</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('ballet_level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">足の形<img src="/assets/img/question.png" alt=""
                                                class="que_sym"></p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="foot_shape"
                                                            value="エジプト型"
                                                            {{ (isset($user) && $user->foot_shape == 'エジプト型') || old('foot_shape') == 'エジプト型' ? 'checked' : '' }}>
                                                        <p class="des_tlt">エジプト型</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="foot_shape"
                                                            value="ギリシャ型"
                                                            {{ (isset($user) && $user->foot_shape == 'ギリシャ型') || old('foot_shape') == 'ギリシャ型' ? 'checked' : '' }}>
                                                        <p class="des_tlt">ギリシャ型</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="foot_shape"
                                                            value="スクエア型"
                                                            {{ (isset($user) && $user->foot_shape == 'スクエア型') || old('foot_shape') == 'スクエア型' ? 'checked' : '' }}>
                                                        <p class="des_tlt">スクエア型</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('foot_shape')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">足の大きさ</p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                <input type="text" class="form-control_1" name="foot_size"
                                                    value="{{ isset($user) ? $user->foot_size : old('foot_size') }}">
                                                <p class="label_input">&nbsp;cm</p>
                                            </div>
                                            @error('foot_size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">足 幅</p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="foot_width"
                                                            value="広め"
                                                            {{ (isset($user) && $user->foot_width == '広め') || old('foot_width') == '広め' ? 'checked' : '' }}>
                                                        <p class="des_tlt">広め</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="foot_width"
                                                            value="ふつう"
                                                            {{ (isset($user) && $user->foot_width == 'ふつう') || old('foot_width') == 'ふつう' ? 'checked' : '' }}>
                                                        <p class="des_tlt">ふつう</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="foot_width"
                                                            value="狭め"
                                                            {{ (isset($user) && $user->foot_width == '狭め') || old('foot_width') == '狭め' ? 'checked' : '' }}>
                                                        <p class="des_tlt">狭め</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('foot_width')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">甲の高さ</p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="foot_height"
                                                            value="高め"
                                                            {{ (isset($user) && $user->foot_height == '高め') || old('foot_height') == '高め' ? 'checked' : '' }}>
                                                        <p class="des_tlt">高め</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="foot_height"
                                                            value="ふつう"
                                                            {{ (isset($user) && $user->foot_height == 'ふつう') || old('foot_height') == 'ふつう' ? 'checked' : '' }}>
                                                        <p class="des_tlt">ふつう</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="foot_height"
                                                            value="低め"
                                                            {{ (isset($user) && $user->foot_height == '低め') || old('foot_height') == '低め' ? 'checked' : '' }}>
                                                        <p class="des_tlt">低め</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('foot_height')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">メルマガ購読</p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="mail_magazin"
                                                            value="する"
                                                            {{ (isset($user) && $user->mail_magazin == 'する') || old('mail_magazin') == 'する' ? 'checked' : '' }}>
                                                        <p class="des_tlt">する</p>
                                                    </div>
                                                </div>
                                                <div class="sp_radio">
                                                    <div class="des">
                                                        <input type="radio" class="des_radio" name="mail_magazin"
                                                            value="しない"
                                                            {{ (isset($user) && $user->mail_magazin == 'しない') || old('mail_magazin') == 'しない' ? 'checked' : '' }}>
                                                        <p class="des_tlt">しない</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('mail_magazin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="action-tool">
                        <button type="submit" class="btn btn__title">上書き修正</button>
                        </div>
                    </form>
                </div>
                <div id="tab2Content" data-tab-content class="tab-content">
                    @if (count($product_reviews) > 0)
                        <div class="set_search_1">
                            @foreach ($product_reviews as $product_review)
                                <div class="my-review-item">
                                    <a href="{{ route('products.detail', $product_review->product_id) }}">
                                        <div class="setsearch_1 wow fadeInUp">
                                            <div class="setsearch_1_setmodal">
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
                                                                        class="row1_des">{{ $product_review->user->age }}</span>&nbsp;代
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
                                                                    <p>レッスン頻度：&nbsp;<span class="col1_des">週&nbsp;2</span>回
                                                                    </p>
                                                                    <p>足幅 : &nbsp;<span
                                                                            class="col1_des">{{ $product_review->user->foot_width }}</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col1">
                                                                    <p>足の大きさ : &nbsp;<span class="col1_des">24</span>(cm)
                                                                    </p>
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
                                                                <p>製品サイズ : &nbsp;<span
                                                                        class="col1_des">{{ $product_review->purchase_size }}</span>&nbsp;(cm)
                                                                </p>

                                                            </div>
                                                            <div class="col1">
                                                                <p>製品名 : &nbsp;<span
                                                                        class="col1_des">{{ $product_review->product->name }}</span>
                                                                </p>
                                                                <p>ワイズ : &nbsp;<span
                                                                        class="col1_des">{{ $product_review->purchase_width }}</span>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="row2">
                                                            <div class="row2_part">
                                                                <div class="star-rating-group">
                                                                    <p class="star-lavel">総合満足度: </p>
                                                                    @include('partials.star-rating', [
                                                                        'rating' =>
                                                                            $product_review->average_satisfaction,
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
                                            </div>
                                        </div>
                                    </a>
                                    <div class="setsearch_1_set_btn">
                                        <button type="submit" id="reviewModalBtn" class="sub_btn">修正する</button>
                                        <form action="{{ route('profile.review-delete', $product_review->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="sub_btn wow fadeInUp"
                                                onclick="return confirm('本当にこの記録を削除しますか？')">削除する
                                            </button>
                                        </form>
                                    </div>
                                </div>
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
                <div id="tab3Content" data-tab-content class="tab-content">
                    @if (count($favorite_products) > 0)
                        @foreach ($favorite_products as $product)
                            <div class="favorited-product-item">
                                <a href="{{ route('products.detail', $product->id) }}">
                                    <div class="search_2_modal wow fadeInUp">
                                        <div class="set_search_2_modal">
                                            <div class="user">
                                                <div class="user_avatar">
                                                    <img src="{{ URL::asset('images/products/' . $product->image) }}"
                                                        alt="" class="">
                                                </div>
                                                <div class="user_setting">
                                                    <div class="col1">
                                                        <p>メーカー名 : &nbsp;<span
                                                                class="col1_des">{{ $product->maker_id }}</span>
                                                        </p>
                                                        <p>口コミ件数 &nbsp;&nbsp;<span
                                                                class="col1_des">{{ $product->reviews()->count() }}</span>(件)
                                                        </p>
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
                                    </div>
                                </a>
                                <form action="{{ route('profile.favorite-delete', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary wow fadeInUp"
                                        onclick="return confirm('本当にこの記録を削除しますか？')">削除
                                    </button>
                                </form>
                            </div>
                        @endforeach
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

            </div>
        </div>
    </section>

    <div id="submitReviewModal" class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <div class="modal_title">
                    <h1 class="modal_title_tlt">チャコット　スワニルダ</h1>
                    <p class="modal_title_subtlt">- Chacott Swanilda -</p>
                </div>
                <form id="submitReviewForm" action="{{ route('add-review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="">
                    <div class="tab_search">
                        <div class="tab_search_part1">
                            <div class="tab2_part1">
                                <p class="tlt_2">購入サイズ : &nbsp;&nbsp;</p>
                                <input type="text" class="in_2" name="purchase_size">
                                <p class="tlt_2">(cm)</p>
                            </div>
                            <div class="tab2_part1">
                                <p class="tlt_2">ワイズ : &nbsp;&nbsp;</p>
                                <input type="text" class="in_2" name="purchase_width">
                            </div>
                            <div class="tab2_part1">
                                <p class="tlt_2">シャンク : &nbsp;&nbsp;</p>
                                <input type="text" class="in_2" name="shank">
                            </div>
                        </div>
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
                            <p class="tlt_2">履き心: </p>
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
                        <textarea name="review_text" id="" cols="30" rows="10" class="in_des"></textarea>
                    </div>
                    <button type="submit" class="btn">投 稿</button>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')
@endsection
