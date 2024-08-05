@extends('frontend.layouts.app')
@section('title')
マイポワント
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<section class="infor_setting">
    <div class="all_search">
        <div class="container">
            <div class="tabs">
                <a href="{{ route('profile.edit') }}" data-tab-target="#tab1Content"
                    class="tab_rad tab1 active">プロフィール編集</a>
                <a href="{{ route('profile.edit-review')}}" class="tab_rad tab2">投稿一覧</a>
                <a href="{{ route('profile.edit-favorite')}}" data-tab-target="#tab3Content"
                    class="tab_rad1 tab3">お気に入り商品一覧</a>
            </div>
            <div id="tab1Content" data-tab-content class="tab-content active">
                <form id="profileForm" action="{{ route('profile.update', compact('user')) }}" method="POST"
                    class="was-validated" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="my_infor_pc_wrap">
                        <div class="des_pc">
                            <div class="part1">
                                <div class="user_avatar">
                                    <div class="avatar-upload">
                                        @error('avatar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <img src="{{ isset($user) ? $user->avatar : old('avatar') }}" alt="Default Avatar" class="avatar_img"
                                            id="avatarImageProfile">
                                        <div>
                                            <label for="avatarInputProfile" class="custom-file-upload">
                                                Upload Avatar
                                            </label>
                                            <input type="file" id="avatarInputProfile" accept="image/*" style="display: none;">
                                            <input type="hidden" id="avatar" name="avatar" accept="image/*" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="part1">
                                <div class="part1_main">
                                    <p class="part1_tlt margin-top">メールアドレス</p>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ isset($user) ? $user->email : old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="part1">
                                <div class="part1_main">
                                    <p class="part1_tlt margin-top">パスワード</p>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password"
                                            value="{{ old('password') }}" class="form-control">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="part1">
                                <div class="part1_main">
                                    <p class="part1_tlt margin-top">パスワード<span class="sub">確認用</span></p>
                                    <div class="form-group">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control">
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="part1">
                                <div class="part1_main">
                                    <p class="part1_tlt  margin-top">表示ニックネーム</p>
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
                                                    <input type="radio" class="des_radio" name="age" value="10歳未満"
                                                        {{(isset($user) && $user->age == '10歳未満') || old('age') == '10歳未満' ? 'checked' : '' }}>
                                                    <p class="des_tlt">10歳未満</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="age" value="10代"
                                                        {{(isset($user) && $user->age == '10代') || old('age') == '10代' ? 'checked' : '' }}>
                                                    <p class="des_tlt">10代</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="age" value="20代"
                                                        {{(isset($user) && $user->age == '20代') || old('age') == '20代' ? 'checked' : '' }}>
                                                    <p class="des_tlt">20代</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="age" value="30代"
                                                        {{(isset($user) && $user->age == '30代') || old('age') == '30代' ? 'checked' : '' }}>
                                                    <p class="des_tlt">30代</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="age" value="40代"
                                                        {{(isset($user) && $user->age == '40代') || old('age') == '40代' ? 'checked' : '' }}>
                                                    <p class="des_tlt">40代</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="age" value="50代"
                                                        {{(isset($user) && $user->age == '50代') || old('age') == '50代' ? 'checked' : '' }}>
                                                    <p class="des_tlt">50代</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="age" value="60代"
                                                        {{(isset($user) && $user->age == '60代') || old('age') == '60代' ? 'checked' : '' }}>
                                                    <p class="des_tlt">60代</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="age" value="70歳以上"
                                                        {{(isset($user) && $user->age == '70歳以上') || old('age') == '70歳以上' ? 'checked' : '' }}>
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
                                                    <input type="radio" class="des_radio" name="gender" value="女性"
                                                        {{ (isset($user) && $user->gender == '女性') || old('gender') == '女性' ? 'checked' : '' }}>
                                                    <p class="des_tlt">女性</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="gender" value="男性"
                                                        {{ (isset($user) && $user->gender == '男性') || old('gender') == '男性' ? 'checked' : '' }}>
                                                    <p class="des_tlt">男性</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="gender" value="回答しない"
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
                                    <p class="part1_tlt margin-top">バレエ歴</p>
                                    <div class="form-group">
                                        <div class="part1_all_radio">
                                            <input type="number" class="form-control_1" name="ballet_career"
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
                                    <p class="part1_tlt">バレエのレベル</p>
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
                                                        value="上級～プロフェッショナル"
                                                        {{ (isset($user) && $user->ballet_level == '上級～プロフェッショナル') || old('ballet_level') == '上級～プロフェッショナル' ? 'checked' : '' }}>
                                                    <p class="des_tlt">上級～プロフェッショナル</p>
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
                                    <p class="part1_tlt">足の形<span class="que_sym"><img src="/assets/img/question.png"
                                                class="que_sym" alt="">
                                            <span class="tooltip hide">
                                                ご自身の足の形を見て、以下を選択してください<br>
                                                エジプト型；親指が最も長い方<br>
                                                ギリシャ型：人差し指か中指が最も長い方<br>
                                                スクエア型：親指から薬指pまでの長さがほぼ同じの方
                                            </span></span></p>
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
                                    <p class="part1_tlt margin-top">足の大きさ</p>
                                    <div class="form-group">
                                        <div class="part1_all_radio">
                                            <input type="number" class="form-control_1" name="foot_size"
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
                                                    <input type="radio" class="des_radio" name="foot_width" value="広め"
                                                        {{ (isset($user) && $user->foot_width == '広め') || old('foot_width') == '広め' ? 'checked' : '' }}>
                                                    <p class="des_tlt">広め</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="foot_width" value="ふつう"
                                                        {{ (isset($user) && $user->foot_width == 'ふつう') || old('foot_width') == 'ふつう' ? 'checked' : '' }}>
                                                    <p class="des_tlt">ふつう</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="foot_width" value="狭め"
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
                                                    <input type="radio" class="des_radio" name="foot_height" value="高め"
                                                        {{ (isset($user) && $user->foot_height == '高め') || old('foot_height') == '高め' ? 'checked' : '' }}>
                                                    <p class="des_tlt">高め</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="foot_height" value="ふつう"
                                                        {{ (isset($user) && $user->foot_height == 'ふつう') || old('foot_height') == 'ふつう' ? 'checked' : '' }}>
                                                    <p class="des_tlt">ふつう</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="foot_height" value="低め"
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
                                                        value="受け取る"
                                                        {{ (isset($user) && $user->mail_magazin == '受け取る') || old('mail_magazin') == '受け取る' ? 'checked' : '' }}>
                                                    <p class="des_tlt">受け取る</p>
                                                </div>
                                            </div>
                                            <div class="sp_radio">
                                                <div class="des">
                                                    <input type="radio" class="des_radio" name="mail_magazin"
                                                        value="受け取らない"
                                                        {{ (isset($user) && $user->mail_magazin == '受け取らない') || old('mail_magazin') == '受け取らない' ? 'checked' : '' }}>
                                                    <p class="des_tlt">受け取らない</p>
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
        </div>
    </div>
</section>
<div id="updateReviewModal" class="modal-dialog">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <div class="modal_title">
                <h1 class="modal_title_tlt" id="product_name"></h1>
            </div>
            <form id="updateReviewForm" action="{{ route('profile.update-review') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="product_review_id" value="">
                <input type="hidden" name="product_id" value="">
                <div class="tab_search">
                    <div class="tab_search_part1">
                        <div class="tab2_part1">
                            <p class="tlt_2">購入サイズ : &nbsp;&nbsp;</p>
                            <input type="text" class="in_2" id="purchase_size" name="purchase_size">
                            <p class="tlt_2">(cm)</p>
                        </div>
                        <div class="tab2_part1">
                            <p class="tlt_2">ワイズ : &nbsp;&nbsp;</p>
                            <input type="text" class="in_2" id="purchase_width" name="purchase_width">
                        </div>
                        <div class="tab2_part1">
                            <p class="tlt_2">シャンク : &nbsp;&nbsp;</p>
                            <input type="text" class="in_2" id="shank" name="shank">
                        </div>
                    </div>
                    <div class="tab_search_part2">
                        <div class="tab2_part2">
                            <p class="tlt_2">総合満足度 : &nbsp;&nbsp;</p>
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="average_satisfaction" checked id="avg_rating1">
                                    <label for="avg_rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="average_satisfaction" id="avg_rating2">
                                    <label for="avg_rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="average_satisfaction" id="avg_rating3">
                                    <label for="avg_rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="average_satisfaction" id="avg_rating4">
                                    <label for="avg_rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="average_satisfaction" id="avg_rating5">
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
                                <input type="radio" value="1" name="quietness" checked id="quietness_rating1">
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
                                <input type="radio" value="1" name="lightness" checked id="lightness_rating1">
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
                                <input type="radio" value="1" name="stability" checked id="stability_rating1">
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
                                <input type="radio" value="1" name="longavity" checked id="longevity_rating1">
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
<script lang="javascript">
    $('#avatarInputProfile').change(function(event){
        event.preventDefault();
        if(event && event.target && event.target.files.length > 0){
            const files = event.target.files;
            var formData = new FormData();
            formData.append('file', files[0]);
            console.log(files)
            $.ajax({
                url : '/upload',
                type : 'POST',
                data : formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success : function(data) {
                    if(data){
                        $('#avatarImageProfile').attr('src', data);
                        $('#avatar').val(data);
                    }else{
                        alert('File upload failed!');
                    }
                }
            });
        }
    })
</script>
@endsection