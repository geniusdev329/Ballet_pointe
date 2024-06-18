@extends('frontend.layouts.app')
@section('title')
    案件登録
@endsection
@section('css')
@endsection
@section('content')
    <section class="faq">
        <div class="container">
            <div class="title title_set">
                <h1 class="title_tlt">ご利用ガイド</h1>
                <p class="title_subtlt">- FAQ -</p>
            </div>
        </div>
        <div class="container">
            <div class="items">

                <div class="faq-item">
                    <a class="faq-question">
                        <div class="ribbon">
                            Q
                        </div>
                        <p class="question">
                            my caddieの推奨動作環境は?
                        </p>
                    </a>
                    <div class="faq-answer">
                        <div class="ribbon">
                            A
                        </div>
                        <p class="answer">
                            テキストテキストテキストテトテテキトテテ
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <a class="faq-question">
                        <div class="ribbon">
                            Q
                        </div>
                        <p class="question">
                            パスワードを忘れてしまった
                        </p>
                    </a>
                    <div class="faq-answer">
                        <div class="ribbon">
                            A
                        </div>
                        <p class="answer">
                            パスワードリセットはこちらから可能です。
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <a class="faq-question">
                        <div class="ribbon">
                            Q
                        </div>
                        <p class="question">
                            my caddie会員のメリットは?
                        </p>
                    </a>
                    <div class="faq-answer">
                        <div class="ribbon">
                            A
                        </div>
                        <p class="answer">
                            テキストテキストテキストテトテテキトテテ
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <a class="faq-question">
                        <div class="ribbon">
                            Q
                        </div>
                        <p class="question">
                            メールアドレスを変更したい
                        </p>
                    </a>
                    <div class="faq-answer">
                        <div class="ribbon">
                            A
                        </div>
                        <p class="answer">
                            テキストテキストテキストテトテテキトテテ
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <a class="faq-question">
                        <div class="ribbon">
                            Q
                        </div>
                        <p class="question">
                            クチコミしたい製品がない
                        </p>
                    </a>
                    <div class="faq-answer">
                        <div class="ribbon">
                            A
                        </div>
                        <p class="answer">
                            テキストテキストテキストテトテテキトテテ
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <a class="faq-question">
                        <div class="ribbon">
                            Q
                        </div>
                        <p class="question">
                            クチコミを編集・削除したい
                        </p>
                    </a>
                    <div class="faq-answer">
                        <div class="ribbon">
                            A
                        </div>
                        <p class="answer">
                            テキストテキストテキストテトテテキトテテ
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <a class="faq-question">
                        <div class="ribbon">
                            Q
                        </div>
                        <p class="question">
                            リニューアル前のIDとパスワ<br>
                            ードでログインできますか?
                        </p>
                    </a>
                    <div class="faq-answer">
                        <div class="ribbon">
                            A
                        </div>
                        <p class="answer">
                            テキストテキストテキストテトテテキトテテ
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <a class="faq-question">
                        <div class="ribbon">
                            Q
                        </div>
                        <p class="question">
                            パスワードを忘れてしまった?
                        </p>
                    </a>
                    <div class="faq-answer">
                        <div class="ribbon">
                            A
                        </div>
                        <p class="answer answer_spe">
                            ユーザーネームまたは登録した
                            メールアドレスをこちらより
                            お送り下さい。追って事務局より
                            ご連絡いたします。
                        </p>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/faq.js') }}"></script>
@endsection
