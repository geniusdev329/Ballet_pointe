@extends('admin.layouts.master')
@section('title')
    商品ロコミ管理
@endsection
@section('css')
    <style>
        .was-validated .invalid-feedback {
            display: block;
        }
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            管理者
        @endslot
        @slot('title')
            商品ロコミ管理
        @endslot
    @endcomponent

    <div class="offset-2 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">商品ロコミ管理</h4>
            </div>
            <div class="card-body">
                <form class="row g-3needs-validation {{ $errors->any() ? 'was-validated' : '' }}" id="productReviewForm"
                    method="POST"
                    action="{{ route('admin.product-reviews.update', $product_review->id) }}"
                    novalidate>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="product_id" value="{{ $product_review->product->id }}">
                    <input type="hidden" name="user_id" value="{{ $product_review->user->id }}">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="email">投稿者</label>
                                <input type="user_nickname" class="form-control form-control-sm" name="user_nickname"
                                    value="{{ $product_review->user->nickname }}" required>
                                @error('user_nickname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="product_name">商品名</label>
                                <input type="text" class="form-control form-control-sm" name="product_name" value="{{ $product_review->product->name }}" required>
                                @error('product_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="purchase_size">購入サイズ</label>
                                <input type="text" class="form-control form-control-sm" name="purchase_size" value="{{ $product_review->purchase_size }}" required>
                                @error('purchase_size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="purchase_width">購入ワイズ</label>
                                <input type="text" class="form-control form-control-sm" name="purchase_width" value="{{ $product_review->purchase_width }}" required>
                                @error('purchase_width')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="shank">シャンク</label>
                                <input type="text" class="form-control form-control-sm" name="shank" value="{{ $product_review->shank }}" required>
                                @error('shank')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="average_satisfaction">総合満足度</label>
                                <input type="text" class="form-control form-control-sm" name="average_satisfaction" value="{{ $product_review->average_satisfaction }}" required>
                                @error('average_satisfaction')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="comfort">履き心地</label>
                                <input type="text" class="form-control form-control-sm" name="comfort" value="{{ $product_review->comfort }}" required>
                                @error('comfort')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="quietness">音の静かさ</label>
                                <input type="text" class="form-control form-control-sm" name="quietness" value="{{ $product_review->quietness }}" required>
                                @error('quietness')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="lightness">軽さ</label>
                                <input type="text" class="form-control form-control-sm" name="lightness" value="{{ $product_review->lightness }}" required>
                                @error('lightness')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="stability">安定性</label>
                                <input type="text" class="form-control form-control-sm" name="stability" value="{{ $product_review->stability }}" required>
                                @error('stability')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="longavity">持ちの良さ</label>
                                <input type="text" class="form-control form-control-sm" name="longavity" value="{{ $product_review->longavity }}" required>
                                @error('longavity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-12 mb-3">
                            <textarea class="form-control" name="content" id="" cols="30" rows="10">{{ isset($product_review) ? $product_review->content : '' }}</textarea>
                        </div>
                        <div class="row mb-3 offset-4">
                            <div class="col-lg-2 text-end">
                                <label for="status" class="form-label">ステータス: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="flexSwitchCheckDefault" name="status" {{ isset($product_review) && ($product_review->status == 1) ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-{{ isset($product_review) ? 'success' : 'primary' }}" type="submit">
                            {{ isset($product_review) ? '更新' : '登録' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
