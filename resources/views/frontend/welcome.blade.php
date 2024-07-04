@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
@endsection
@section('content')
    <div id="searchByMakerModal" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <div class="modal_title">
                    <h1 class="modal_title_tlt">メーカーから探す</h1>
                    <p class="modal_title_subtlt">- Search by Features -</p>
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
                    <div class="maker-content">
                        @foreach ($makers as $type => $makerGroup)
                            <div style="margin-bottom: 20px;">
                                <p>{{ $type == 0 ? '国内メーカー' : '海外メーカー' }}</p>
                                <div class="check-group">
                                    @foreach ($makerGroup as $id => $name)
                                        <div class="check-item">
                                            <input type="checkbox" class="check-control" name="makers[]"
                                                value="{{ $id }}">
                                            <p class="check-lavel">{{ $name }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn">メーカーから探す</button>
                </form>
            </div>
        </div>
    </div>
    <div id="searchByFeaturesModal" class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <div class="modal_title">
                    <h1 class="modal_title_tlt">特徴から口コミを探す</h1>
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
                <form action="{{ route('search-by-features') }}" method="POST">
                    @csrf
                    <div class="tab3_sub_tlt">
                        <p class="sub">評価から探す</p>
                    </div>
                    <div class="tab_search_check">
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="average_satisfaction" value="4">
                            <p class="item_des1">総合満足度４以上</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="comfort" value="4">
                            <p class="item_des1">履き心地４以上</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="quietness" value="4">
                            <p class="item_des1">音の静かさ４以上</p>
                        </div>
                    </div>
                    <div class="tab_search_check">
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="lightness" value="4">
                            <p class="item_des1">軽さ４以上</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="stability" value="4">
                            <p class="item_des1">安定性4以上</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="longavity" value="4">
                            <p class="item_des1">持ちの良さ４以上</p>
                        </div>
                    </div>


                    <div class="tab3_sub_tlt">
                        <p class="sub">足の特徴から探す</p>
                    </div>
                    <div class="tab_search_check">
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="foot_shape[]" value="エジプト型">
                            <p class="item_des1">エジプト型</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="foot_shape[]" value="ギリシャ型">
                            <p class="item_des1">ギリシャ型</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="foot_shape[]" value="スクエア型">
                            <p class="item_des1">スクエア型</p>
                        </div>
                    </div>
                    <div class="tab_search_check">
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="foot_width[]" value="広め">
                            <p class="item_des1">足幅広め</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="foot_width[]" value="ふつう">
                            <p class="item_des1">足幅ふつう</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="foot_width[]" value="狭め">
                            <p class="item_des1">足幅狭め</p>
                        </div>
                    </div>
                    <div class="tab_search_check">
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="foot_height[]" value="高め">
                            <p class="item_des1">甲が高め</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="foot_height[]" value="ふつう">
                            <p class="item_des1">甲高ふつう</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="foot_height[]" value="低め">
                            <p class="item_des1">甲が低め</p>
                        </div>
                    </div>

                    <div class="tab3_sub_tlt">
                        <p class="sub">バレエのレベルから探す</p>
                    </div>
                    <div class="tab_search_check">
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="ballet_level[]" value="入門～初級者">
                            <p class="item_des">入門～初級者</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="ballet_level[]" value="初級～中級者">
                            <p class="item_des">初級～中級者</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="ballet_level[]" value="中級～上級者">
                            <p class="item_des">中級～上級者</p>
                        </div>
                        <div class="tab_search_check_item">
                            <input type="checkbox" class="item_check" name="ballet_level[]" value="プロレベル">
                            <p class="item_des">上級～プロフェッショナル</p>
                        </div>
                    </div>
                    <div class="action-tool">
                        <button type="submit" class="btn">特徴から探す</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div id="searchByNameModal" class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <div class="modal_title">
                    <h1 class="modal_title_tlt">製品名で探す</h1>
                    <p class="modal_title_subtlt">- Search by product name -</p>
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
                <form action="{{ route('search-by-name') }}" method="POST">
                    @csrf
                    <div class="part1_main">
                        <p class="part1_tlt">製品名</p>
                        <div class="form-group">
                            <input type="text" class="form-control" name="product_name"
                                value="{{ old('product_name') }}">
                            @error('product_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="action-tool">
                        <button type="submit" class="btn">製品名で探す</button>
                    </div>
                </form>
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
                <div id="searchByFeaturesBtn" class="fv__tabs tab_l_rad">
                    <h1 class="__text">特徴から探す</h1>
                </div>
                <div id="searchByMakerBtn" class="fv__tabs tab_m_rad">
                    <h1 class="__text">メーカーから探す</h1>
                </div>
                <div id="searchByNameBtn" class="fv__tabs tab_r_rad">
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
                @if (count($product_reviews) > 0)
                    @foreach ($product_reviews as $review)
                        <a class="com_logos" href="{{ route('products.detail', $review->product->id) }}">
                            <figure class="com_logos__logo logo1_property">
                                <img src="{{ (isset($review) && isset($review->product->maker->logo_img)) ? URL::asset('images/maker_logos/' . $review->product->maker->logo_img) : '' }}"
                                 alt="">
                            </figure>
                            <p class="text">{{ $review->content }}</p>
                        </a>
                    @endforeach
                @else
                    <div class="empty-data">表示するデータがありません。</div>
                @endif
            </div>
        </div>
    </section>

    <section class="points">
        <div class="container">
            <div class="title">
                <h1 class="title_tlt">バレリーナのマイポワント</h1>
                <p class="title_subtlt">- Ballerina's pointe -</p>
            </div>
            <div class="company">
                @if (count($blogs) > 0)
                    @foreach ($blogs as $blog)
                        <a href="{{ route('blogs.detail', $blog->id) }}">
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
                @else
                    <div class="empty-data">表示するデータがありません。</div>
                @endif
            </div>
            <div class="read_more">
                <a href="{{ route('blogs') }}">
                    <div class="btn">
                        <p class="btn__title">
                            一覧を見る
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
                @if (count($notifications) > 0)
                    @foreach ($notifications as $notification)
                        <a href="{{ route('detail-notification', $notification->id) }}" class="data">
                            <p class="data__date">{{ $notification->created_at->format('Y年 n月 j日') }}</p>
                            <p class="data__des">{{ $notification->title }}</p>
                        </a>
                    @endforeach
                @else
                    <div  class="empty-data">表示するデータがありません。</div>
                @endif
            </div>
            <div class="read_more">
                <a href="{{ route('notification-list') }}">
                    <div class="btn">
                        <p class="btn__title">
                            一覧を見る
                        </p>
                        <img src="./assets/img/arrow.png" alt="">
                    </div>
                </a>
            </div>
        </div>

    </section>
@endsection
@section('script')
@endsection
