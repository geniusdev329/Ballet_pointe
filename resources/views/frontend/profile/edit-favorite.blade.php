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
                    <a  href="{{ route('profile.edit') }}" data-tab-target="#tab1Content" class="tab_rad tab1">プロフィール編集</a>
                    <a  href="{{ route('profile.edit-review')}}" class="tab_rad tab2">投稿一覧</a>
                    <a href="{{ route('profile.edit-favorite')}}" data-tab-target="#tab3Content" class="tab_rad1 tab3 active">お気に入り商品一覧</a>
                </div>
                <div id="tab3Content" data-tab-content class="tab-content active">
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
                                                        <div class="col1" style="gap: 30px">
                                                            <p>製品名 : &nbsp;<span
                                                                    class="col1_des">{{ $product->name }}</span>
                                                            </p>
                                                            <p>メーカー名 : &nbsp;<span
                                                                    class="col1_des">{{ $product->maker->name }}</span>
                                                            </p>
                                                        </div>
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
                                    <button type="submit" class="btn wow fadeInUp"
                                        onclick="return confirm('本当にこの記録を削除しますか？')">削除
                                    </button>
                                </form>
                            </div>
                        @endforeach
                        {{-- <div class="read_more wow fadeInUp">
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
                        </div> --}}
                    @else
                        <div class="alert empty-alert">表示するデータがありません。</div>
                    @endif
                </div>

            </div>
        </div>
    </section>

@endsection
@section('script')
@endsection
