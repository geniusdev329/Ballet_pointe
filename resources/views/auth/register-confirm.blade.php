@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
@endsection
@section('content')
    <section class="my_infor_pc login">
        <div class="register_container register_confirm">
            <div class="title title_set">
                <h1 class="title_tlt">新規会員登録</h1><br><br>
                <p class="">入力内容を確認してください。</p>
            </div>
            <form id="registerForm" action="{{ route('register-confirm') }}" method="POST">
                @csrf
                <div class="my_infor_pc_wrap">
                    <div class="des_pc">
                        <div class="part1">
                            <div class="user_avatar">
                                <div class="avatar-upload">
                                    @if ($request->avatar)
                                    <img src="{{ $request->avatar }}" class="avatar_common" alt="User Avatar" id="avatarImage">
                                    @else
                                    <img src="./images/users/avatar-1.jpg" alt="Default Avatar" class="avatar_common" id="avatarImage">
                                    @endif
                                </div>
                                <input type="hidden" name="avatar" value="{{ $request->avatar }}" />
                            </div>
                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt ">メールアドレス</p>
                                <div class="form-group">
                                    {{ $request->email }}
                                </div>
                                <input type="hidden" name="email" value="{{ $request->email }}" />
                            </div>

                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt ">パスワード</p>
                                <div class="form-group">
                                    {{ $request->password }}
                                </div>
                                <input type="hidden" name="password" value="{{ $request->password }}" />
                            </div>
                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt ">表示ニックネーム</p>
                                <div class="form-group">
                                    {{ $request->nickname }}
                                </div>
                                <input type="hidden" name="nickname" value="{{ $request->nickname }}" />
                            </div>
                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt">年 齢</p>
                                <div class="form-group">
                                    <div class="part1_all_radio">
                                        <div class="sp_radio">
                                            <div class="des">
                                                {{ $request->age }}
                                            </div>
                                        </div>
                                        <input type="hidden" name="age" value="{{ $request->age }}" />
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
                                                {{ $request->gender }}
                                            </div>
                                            <input type="hidden" name="gender" value="{{ $request->gender }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt ">バレエ歴</p>
                                <div class="form-group">
                                    <div class="part1_all_radio">
                                        {{ $request->ballet_career }}
                                        <p class="label_input1">年</p>
                                    </div>
                                </div>
                                <input type="hidden" name="ballet_career" value="{{ $request->ballet_career }}" />
                            </div>
                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt">バレエのレベル</p>
                                <div class="form-group">
                                    <div class="part1_all_radio">
                                        <div class="sp_radio">
                                            <div class="des">
                                                {{ $request->ballet_level }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="ballet_level" value="{{ $request->ballet_level }}" />
                            </div>

                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt">足の形
                                    <span class="que_sym"><img src="/assets/img/question.png" class="que_sym"alt="">
                                        <span class="tooltip hide">
                                            ご自身の足の形を見て、以下を選択してください<br>
                                            エジプト型；親指が最も長い方<br>
                                            ギリシャ型：人差し指か中指が最も長い方<br>
                                            スクエア型：親指から薬指pまでの長さがほぼ同じの方
                                        </span></span>
                                </p>

                                <div class="form-group">
                                    <div class="part1_all_radio">
                                        <div class="sp_radio">
                                            <div class="des">
                                                {{ $request->foot_shape }}
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="foot_shape" value="{{ $request->foot_shape }}" />
                                </div>
                            </div>
                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt ">足の大きさ</p>
                                <div class="form-group">
                                    <div class="part1_all_radio">
                                        {{ $request->foot_size }}
                                        <p class="label_input">&nbsp;cm</p>
                                    </div>
                                </div>
                                <input type="hidden" name="foot_size" value="{{ $request->foot_size }}" />
                            </div>
                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt">足 幅</p>
                                <div class="form-group">
                                    <div class="part1_all_radio">
                                        <div class="sp_radio">
                                            <div class="des">
                                                {{ $request->foot_width }}
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="foot_width" value="{{ $request->foot_width }}" />
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
                                                {{ $request->foot_height }}
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="foot_height" value="{{ $request->foot_height }}" />
                                </div>
                            </div>
                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt">マイポワントからのお知らせ</p>
                                <div class="form-group">
                                    <div class="part1_all_radio ">
                                        <div class="sp_radio">
                                            <div class="des">
                                                {{ $request->mail_magazin }}
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="mail_magazin" value="{{ $request->mail_magazin }}" />
                                    @error('mail_magazin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: flex">
                    {{-- <a class="btn btn__title" href="{{ route('register',$request) }}">戻る</a> --}}
                    <a class="btn btn__title" href="javascript:goBack();">戻る</a>
                    <button type="submit" class="btn btn__title">会員登録する</button>
                    {{-- <button onclick="goBack()" class="btn btn__title">戻る</button> --}}
                </div>
            </form>
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
