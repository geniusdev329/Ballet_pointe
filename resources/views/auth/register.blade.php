@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
@endsection
@section('content')
    <section class="my_infor_pc login">
        <div class="register_container">
            <div class="title title_set">
                <h1 class="title_tlt">新規会員登録</h1><br><br>
                <p class="">すべての項目にご回答ください。</p>
            </div>
            <form id="registerForm" action="{{ route('register') }}" method="POST" class="was-validated">
                @csrf
                <div class="my_infor_pc_wrap">
                    <div class="des_pc">
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt margin-top">メールアドレス</p>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
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
                                        class="form-control">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt margin-top">パスワード<span class="sub">(確認用）</span></p>
                                <div class="form-group">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="part1">
                            <div class="part1_main">
                                <p class="part1_tlt margin-top">表示ニックネーム</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nickname" value="{{ old('nickname') }}">
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
                                                <input type="radio" class="des_radio" name="age"
                                                    value="10歳未満" {{ old('age') == '10歳未満' ? 'checked' : '' }}>
                                                <p class="des_tlt">10歳未満</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="age"
                                                    value="10代" {{ old('age') == '10代' ? 'checked' : '' }}>
                                                <p class="des_tlt">10代</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="age"
                                                    value="20代" {{ old('age') == '20代' ? 'checked' : '' }}>
                                                <p class="des_tlt">20代</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="age"
                                                    value="30代" {{ old('age') == '30代' ? 'checked' : '' }}>
                                                <p class="des_tlt">30代</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="age"
                                                    value="40代" {{ old('age') == '40代' ? 'checked' : '' }}>
                                                <p class="des_tlt">40代</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="age"
                                                    value="50代" {{ old('age') == '50代' ? 'checked' : '' }}>
                                                <p class="des_tlt">50代</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="age"
                                                    value="60代" {{ old('age') == '60代' ? 'checked' : '' }}>
                                                <p class="des_tlt">60代</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="age"
                                                    value="70歳以上" {{ old('age') == '70歳以上' ? 'checked' : '' }}>
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
                                                <input type="radio" class="des_radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }}>
                                                <p class="des_tlt">女性</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="gender" value="男性" {{ old('gender') == '男性' ? 'checked' : '' }}>
                                                <p class="des_tlt">男性</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="gender" value="回答しない" {{ old('gender') == '回答しない' ? 'checked' : '' }}>
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
                                        <input type="text" class="form-control_1"
                                            name="ballet_career"  value="{{ old('ballet_career') }}">
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
                                                    value="入門～初級者" {{ old('ballet_level') == '入門～初級者' ? 'checked' : '' }}>
                                                <p class="des_tlt">入門～初級者</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="ballet_level"
                                                    value="初級～中級者" {{ old('ballet_level') == '初級～中級者' ? 'checked' : '' }}>
                                                <p class="des_tlt">初級～中級者</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="ballet_level"
                                                    value="中級～上級者" {{ old('ballet_level') == '中級～上級者' ? 'checked' : '' }}>
                                                <p class="des_tlt">中級～上級者</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="ballet_level"
                                                    value="プロレベル" {{ old('ballet_level') == 'プロレベル' ? 'checked' : '' }}>
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
                                <p class="part1_tlt">足の形
                                    <span class="que_sym"><img src="/assets/img/question.png" class="que_sym"alt="">
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
                                                    value="エジプト型" {{ old('foot_shape') == 'エジプト型' ? 'checked' : '' }}>
                                                <p class="des_tlt">エジプト型</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="foot_shape"
                                                    value="ギリシャ型" {{ old('foot_shape') == 'ギリシャ型' ? 'checked' : '' }}>
                                                <p class="des_tlt">ギリシャ型</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="foot_shape"
                                                    value="スクエア型" {{ old('foot_shape') == 'スクエア型' ? 'checked' : '' }}>
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
                                        <input type="text" class="form-control_1" name="foot_size"  value="{{ old('foot_size') }}">
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
                                                    value="広め" {{ old('foot_width') == '広め' ? 'checked' : '' }}>
                                                <p class="des_tlt">広め</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="foot_width"
                                                    value="ふつう" {{ old('foot_width') == 'ふつう' ? 'checked' : '' }}>
                                                <p class="des_tlt">ふつう</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="foot_width"
                                                    value="狭め" {{ old('foot_width') == '狭め' ? 'checked' : '' }}>
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
                                                    value="高め" {{ old('foot_height') == '高め' ? 'checked' : '' }}>
                                                <p class="des_tlt">高め</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="foot_height"
                                                    value="ふつう" {{ old('foot_height') == 'ふつう' ? 'checked' : '' }}>
                                                <p class="des_tlt">ふつう</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="foot_height"
                                                    value="低め" {{ old('foot_height') == '低め' ? 'checked' : '' }}>
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
                                <p class="part1_tlt">マイポワントからのお知らせ</p>
                                <div class="form-group">
                                    <div class="part1_all_radio margin-top">
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="mail_magazin"
                                                    value="受け取る" {{ old('mail_magazin') == '受け取る' ? 'checked' : '' }}>
                                                <p class="des_tlt">受け取る</p>
                                            </div>
                                        </div>
                                        <div class="sp_radio">
                                            <div class="des">
                                                <input type="radio" class="des_radio" name="mail_magazin"
                                                    value="受け取らない" {{ old('mail_magazin') == '受け取らない' ? 'checked' : '' }}>
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
                        <div class="part2">
                            <div class="part2_all_radio">
                                <div class="form-group">
                                    <div class="des_radio">
                                        <label class="des_radio des_tlt">
                                            <input type="checkbox" class="des_checkbox" name="tos_confirm" {{ old('tos_confirm') ? 'checked' : '' }}>
                                            利用規約を確認しました
                                        </label>
                                    </div>
                                    @error('tos_confirm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="part2">
                            <div class="part2_all_radio">
                                <div class="form-group">
                                    <div class="des_radio">
                                        <label class="des des_tlt">
                                            <input type="checkbox" class="des_checkbox" name="privacy_policy_confirm" {{ old('privacy_policy_confirm') ? 'checked' : '' }}>
                                            プライバシーポリシーを確認
                                        </label>
                                    </div>
                                    @error('privacy_policy_confirm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn__title">会員登録する</button>
            </form>
        </div>
    </section>
@endsection
@section('script')
@endsection
