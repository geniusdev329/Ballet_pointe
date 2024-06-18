@extends('frontend.layouts.app')
@section('title')
    案件登録
@endsection
@section('css')
@endsection
@section('content')
    <section class="my_infor_pc login">
        <div class="my_infor_pc_wrap">
            <div class="des_pc">
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">メールアドレス</p>
                    <input type="email" class="part1_in_put" name="email">
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">メールアドレス<span class="sub">(確認用）</span></p>
                    <input type="email" class="part1_in_put" name="email_confirmation">
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">パスワード</p>
                    <input type="password" id="pass" name="password" maxlength="8" required class="part1_in_put">
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">パスワード<span class="sub">(確認用）</span></p>
                    <input type="password" id="pass" name="password_confirmation" maxlength="8" required class="part1_in_put">
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">表示ニックネーム</p>
                    <input type="text" class="part1_in_put">
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">年 齢</p>

                    <div class="part1_all_radio">
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" id="age_30" name="age" value="30">
                                <p class="des_tlt">30代</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" id="age_70" name="age" value="70">
                                <p class="des_tlt">70歳以上</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">性 別</p>
                    <div class="part1_all_radio">
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="gender" value="女性">
                                <p class="des_tlt">女性</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="gender" value="男性">
                                <p class="des_tlt">男性</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="gender" value="">
                                <p class="des_tlt">回答しない</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">バレエ歴</p>
                    <input type="text" class="part1_in_put_1" placeholder="20" name="ballet_career">
                    <p class="label_input1">年</p>
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">バレエのレベル<img src="./assets/img/question.png" alt="" class="que_sym"></p>
                    <div class="part1_all_radio">
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="ballet_level" value="入門～初級者">
                                <p class="des_tlt">入門～初級者</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="ballet_level" value="初級～中級者">
                                <p class="des_tlt">初級～中級者</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part1 wow fadeInUp">
                    <div class="part1_all_radio">
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="ballet_level" value="中級～上級者">
                                <p class="des_tlt">中級～上級者</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="ballet_level" value="プロレベル">
                                <p class="des_tlt">プロレベル</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">足の形<img src="./assets/img/question.png" alt="" class="que_sym"></p>
                    <div class="part1_all_radio">
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="foot_shape" value="エジプト型">
                                <p class="des_tlt">エジプト型</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="foot_shape" value="ギリシャ型">
                                <p class="des_tlt">ギリシャ型</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="foot_shape" value="スクエア型">
                                <p class="des_tlt">スクエア型</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">足の大きさ</p>
                    <input type="text" class="part1_in_put_1" name="foot_size">
                    <p class="label_input">&nbsp;cm</p>
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">足 幅</p>
                    <div class="part1_all_radio">
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="foot_width" value="広め">
                                <p class="des_tlt">広め</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="foot_width" value="ふつう">
                                <p class="des_tlt">ふつう</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="foot_width" value="狭め">
                                <p class="des_tlt">狭め</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">甲の高さ</p>
                    <div class="part1_all_radio">
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="foot_height" value="高め">
                                <p class="des_tlt">高め</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="foot_height" value="ふつう">
                                <p class="des_tlt">ふつう</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="foot_height" value="低め">
                                <p class="des_tlt">低め</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part1 wow fadeInUp">
                    <p class="part1_tlt">メルマガ購読</p>
                    <div class="part1_all_radio">
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="mail_magazin" value="する">
                                <p class="des_tlt">する</p>
                            </div>
                        </div>
                        <div class="sp_radio">
                            <div class="des">
                                <input type="radio" class="des_radio" name="mail_magazin" value="しない">
                                <p class="des_tlt">しない</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="part2 wow fadeInUp">
                    <div class="part2_all_radio">
                        <div class="des_radio">
                            <div class="des_radio">
                                <input type="checkbox" class="des_checkbox">
                                <p class="des_tlt">利用規約を確認しました</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part2 wow fadeInUp">
                    <div class="part2_all_radio">
                        <div class="des_radio">
                            <div class="des">
                                <input type="checkbox" class="des_checkbox">
                                <p class="des_tlt">プライバシーポリシーを確認</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="common_btn wow fadeInUp">
            <div class="sub_btn">
                <p class="text">会員登録する</p>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
