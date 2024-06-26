@extends('frontend.layouts.app')
@section('title')
    案件登録
@endsection
@section('css')
@endsection
@section('content')
    <div id="myModal1" class="modal_dialog1">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <div class="modal_title">
                    <h1 class="modal_title_tlt">メーカーから探す</h1>
                    <p class="modal_title_subtlt">- Search by Manufacturer -</p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('search-by-maker') }}" method="POST">
                    @csrf
                    <div class="tab_search_check">
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="makers[]" value="テキスト1">
                            <p class="item_des">テキスト1</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="makers[]" value="テキスト2">
                            <p class="item_des">テキスト2</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="makers[]" value="テキスト3">
                            <p class="item_des">テキスト3</p>
                        </div>
                    </div>
                    <div class="tab_search_check">
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="makers[]" value="テキスト4">
                            <p class="item_des">テキスト4</p>
                        </div>
                    </div>
                    <button type="submit" class="btn">メーカーから探す</button>
                </form>
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal_dialog3">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <div class="modal_title">
                    <h1 class="modal_title_tlt">メーカーから探す</h1>
                    <p class="modal_title_subtlt">- Search by Manufacturer -</p>
                </div>
                <div class="tab3_sub_tlt">
                    <p class="sub">評価</p>
                    <span class="sub_divide"></span>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des1">総合評価4以上</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des1">ドゥミのしやすさ4以上</p>
                    </div>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des1">音の静かさ４以上</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des1">持ちの良さ4以上</p>
                    </div>
                </div>

                <div class="tab3_sub_tlt">
                    <p class="sub">評価</p>
                    <span class="sub_divide"></span>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">入門～初級</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">初級～中級</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">中級～上級</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">プロ</p>
                    </div>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">1 0 歳未満</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">10 代&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">20 代&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">30 代</p>
                    </div>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">30代</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">50代</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">60代</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">70歳以上</p>
                    </div>
                </div>

                <div class="tab3_sub_tlt">
                    <p class="sub">評価</p>
                    <span class="sub_divide"></span>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                </div>

                <div class="tab3_sub_tlt">
                    <p class="sub">評価</p>
                    <span class="sub_divide"></span>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                </div>

                <div class="tab3_sub_tlt">
                    <p class="sub">評価</p>
                    <span class="sub_divide"></span>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                </div>
                <div class="tab_search_check">
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                    <div class="tab_search_check_item">
                        <input type="checkbox" class="item_check">
                        <p class="item_des">テキスト</p>
                    </div>
                </div>

                <div class="common_btn_tab2">
                    <a href="./search_1.html">
                        <div class="sub_btn">
                            <p class="text">特徴から探す</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
    <section class="p-fv">
        <div class="top_img">
            <img src="./assets/img/fv_top.png" alt="" class="fv_img">
            <div class="lg_title">
                <p>あなたにピッタリなトゥシューズに出会える口コミサイト</p>
            </div>
            <div class="top_mark">
                <img src="./assets/img/logo-pc.png" alt="">
            </div>
            <div class="fv">
                <div id="myBtn2" class="fv__tabs tab_l_rad">
                    <h1 class="__text">特徴から探す</h1>
                </div>
                <div id="myBtn1" class="fv__tabs tab_m_rad">
                    <h1 class="__text">メーカーから探す</h1>
                </div>
                <div class="fv__tabs tab_r_rad">
                    <h1 class="__text">製品名で探す</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="new_reviews">
        <div class="container">
            <div class="title">
                <h1 class="title_tlt">新着口コミ</h1>
                <p class="title_subtlt">- New reviews -</p>
            </div>
            <div class="new_reviews_company">
                <div class="com_logos">
                    <img src="./assets/img/com_logo1.png" class="com_logos__logo logo1_property" alt="">
                    <p class="text">
                        テキストテキストテキストテキストテテキストキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
                <div class="com_logos">
                    <img src="./assets/img/com_logo2.png" class="com_logos__logo logo2_property" alt="">
                    <p class="text">テキストテキストテキストテキストテテキストキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
                <div class="com_logos">
                    <img src="./assets/img/com_logo3.png" class="com_logos__logo logo3_property" alt="">
                    <p class="text">テキストテキストテキストテキストテテキストキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
                <div class="com_logos">
                    <img src="./assets/img/com_logo1.png" class="com_logos__logo logo1_property" alt="">
                    <p class="text">テキストテキストテキストテキストテテキストキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
            </div>
        </div>
    </section>

    <section class="points">
        <div class="container">
            <div class="title">
                <h1 class="title_tlt">バレリーナのマイポワント</h1>
                <p class="title_subtlt">- New reviews -</p>
            </div>
            <div class="company">
                @foreach ($blogs as $blog)
                    <a href="{{ route('blogs') }}">
                        <div class="com_shoes wow fadeIn">
                            <img src="{{ URL::asset('images/blogs/' . $blog->image) }}" class="com_shoes__shoes"
                                alt="">
                            <div class="com_shoes__describe">
                                <p class="date">{{ $blog->created_at->format('Y年 n月 j日') }}</p>
                                <p class="text">{{ $blog->title }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="read_more">
                <a href="./pointe.html">
                    <div class="btn">
                        <p class="btn__title">
                            一覧を見る&
                        </p>
                        <img src="./assets/img/arrow.png" alt="">
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="news_all">
        <div class="container_news">
            <div class="title">
                <h1 class="title_tlt">お知らせ</h1>
                <p class="title_subtlt">- News -</p>
            </div>
            <div class="news_data">
                @foreach($notifications as $notification)
                <div class="data">
                    <p class="data__date">{{ $notification->created_at->format('Y.N.j') }}</p>
                    <p class="data__des"><a href="">{{ $notification->title }}</a></p>
                </div>
                @endforeach
            </div>
            <div class="read_more">
                <div class="btn">
                    <p class="btn__title">
                        一覧を見る&
                    </p>
                    <img src="./assets/img/arrow.png" alt="">
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
@endsection
