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
                    <a  href="{{ route('profile.edit') }}" data-tab-target="#tab1Content" class="tab_rad tab1 active">プロフィール編集</a>
                    <a  href="{{ route('profile.edit-review')}}" class="tab_rad tab2">投稿一覧</a>
                    <a href="{{ route('profile.edit-favorite')}}" data-tab-target="#tab3Content" class="tab_rad1 tab3">お気に入り商品一覧</a>
                </div>
                <div data-tab-content class="tab-content active profile-edit-confirm">
                    <form action="{{ route('profile.edit-confirm', $request) }}" method="POST"
                        class="was-validated">
                        @csrf
                        @method('POST')
                        <div class="my_infor_pc_wrap">
                            <div class="des_pc">
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">メールアドレス</p>
                                        <div class="form-group">
                                            {{$request->email}}
                                        </div>
                                    </div>

                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">パスワード</p>
                                        <div class="form-group">
                                            {{ $request->password}}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">パスワード<span class="sub">確認用</span></p>
                                        <div class="form-group">
                                            {{ $request->password}}
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">表示ニックネーム</p>
                                        <div class="form-group">
                                            {{ $request->nickname}}
                                        </div>
                                    </div>
                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">年 齢</p>
                                        <div class="form-group">
                                                <div  class="part1_all_radio">
                                                    <div class="sp_radio">
                                                        <div class="des">
                                                            {{ $request->age}}
                                                        </div>
                                                    </div>
                                                    
                                                </div>
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
                                                        {{ $request->gender}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="part1">
                                    <div class="part1_main">
                                        <p class="part1_tlt">バレエ歴</p>
                                        <div class="form-group">
                                            <div class="part1_all_radio">
                                                {{ $request->ballet_career}}
                                                <p class="label_input1">年</p>
                                            </div>
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
                                                        {{ $request->ballet_level}}
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
                                        <p class="part1_tlt">足の形<span class="que_sym"><img src="/assets/img/question.png" class="que_sym"alt="">
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
                                                        {{ $request->foot_shape}}
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
                                                {{ $request->foot_size}}
                                                <p class="label_input">&nbsp;cm</p>
                                            </div>
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
                                                        {{ $request->foot_width}}
                                                    </div>
                                                </div>
                                                
                                            </div>
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
                                                        {{ $request->foot_height}}
                                                    </div>
                                                </div>
                                            </div>
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
                                                        {{ $request->mail_magazin}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="action-tool" style="display: flex">
                            <a class="btn btn__title" href="javascript:goBack();">戻る</a>
                            <button type="submit" class="btn btn__title">上書き修正する</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection
