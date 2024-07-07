@extends('admin.layouts.master')
@section('title')
    ユーザー登録
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
            ユーザー登録
        @endslot
    @endcomponent

    <div class="offset-2 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">ユーザー登録</h4>
            </div>
            <div class="card-body">
                <form class="row g-3needs-validation {{ $errors->any() ? 'was-validated' : '' }}" id="register_dev_company"
                    method="POST"
                    action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
                    novalidate>
                    @csrf
                    @if (isset($user))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="email">メールアドレス</label>
                                <input type="email" class="form-control form-control-sm" name="email"
                                    value="{{ isset($user) ? old('email', $user->email) : old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="password">パスワード</label>
                                <input type="password" class="form-control form-control-sm" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="password_confirmation">パスワード確認</label>
                                <input type="password" class="form-control form-control-sm" name="password_confirmation" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="nickname">ニックネーム</label>
                                <input type="text" class="form-control form-control-sm" name="nickname"
                                    value="{{ isset($user) ? old('nickname', $user->nickname) : old('nickname') }}"
                                    required>
                                @error('nickname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="gender">性 別</label>
                                <select class="form-select form-select-sm" id="gender" name="gender" required>
                                    <option value="回答しない" {{ isset($user) && $user->gender == '回答しない' ? 'selected' : '' }}>
                                        回答しない</option>
                                    <option value="男性" {{ isset($user) && $user->gender == '男性' ? 'selected' : '' }}>男性
                                    </option>
                                    <option value="女性" {{ isset($user) && $user->gender == '男性' ? 'selected' : '' }}>女性
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="age">年 齢</label>
                                <select class="form-select form-select-sm" id="age" name="age" required>
                                    <option value="10歳未満" {{ isset($user) && $user->age == '10歳未満' ? 'selected' : '' }}>10歳未満</option>
                                    <option value="10代" {{ isset($user) && $user->age == '10代' ? 'selected' : '' }}>10代</option>
                                    <option value="20代" {{ isset($user) && $user->age == '20代' ? 'selected' : '' }}>20代</option>
                                    <option value="30代" {{ isset($user) && $user->age == '30代' ? 'selected' : '' }}>30代</option>
                                    <option value="40代" {{ isset($user) && $user->age == '40代' ? 'selected' : '' }}>40代</option>
                                    <option value="50代" {{ isset($user) && $user->age == '50代' ? 'selected' : '' }}>50代</option>
                                    <option value="60代" {{ isset($user) && $user->age == '60代' ? 'selected' : '' }}>60代</option>
                                    <option value="70歳以上" {{ isset($user) && $user->age == '70歳以上' ? 'selected' : '' }}>70歳以上</option>
                                </select>
                                @error('age')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="ballet_career">バレエ歴</label>
                                <input type="text" class="form-control form-control-sm" name="ballet_career"
                                    value="{{ isset($user) ? old('ballet_career', $user->ballet_career) : old('ballet_career') }}"
                                    required>
                                @error('ballet_career')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="ballet_level">バレエのレベル</label>
                                <select class="form-select form-select-sm" id="ballet_level" name="ballet_level" required>
                                    <option value="入門～初級者"
                                        {{ isset($user) && $user->ballet_level == '入門～初級者' ? 'selected' : '' }}>入門～初級者
                                    </option>
                                    <option value="初級～中級者"
                                        {{ isset($user) && $user->ballet_level == '初級～中級者' ? 'selected' : '' }}>初級～中級者
                                    </option>
                                    <option value="中級～上級者"
                                        {{ isset($user) && $user->ballet_level == '中級～上級者' ? 'selected' : '' }}>中級～上級者
                                    </option>
                                    <option value="プロレベル"
                                        {{ isset($user) && $user->ballet_level == 'プロレベル' ? 'selected' : '' }}>プロレベル
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="foot_shape">足の形</label>
                                <select class="form-select form-select-sm" id="foot_shape" name="foot_shape" required>
                                    <option value="エジプト型"
                                        {{ isset($user) && $user->foot_shape == 'エジプト型' ? 'selected' : '' }}>エジプト型</option>
                                    <option value="ギリシャ型"
                                        {{ isset($user) && $user->foot_shape == 'ギリシャ型' ? 'selected' : '' }}>ギリシャ型</option>
                                    <option value="スクエア型"
                                        {{ isset($user) && $user->foot_shape == 'スクエア型' ? 'selected' : '' }}>スクエア型
                                    </option>
                                </select>
                                @error('foot_shape')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="foot_size">足の大きさ</label>
                                <input type="text" class="form-control form-control-sm" name="foot_size"
                                    value="{{ isset($user) ? old('foot_size', $user->foot_size) : old('foot_size') }}"
                                    required>
                                @error('foot_size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="foot_width">足 幅</label>
                                <select class="form-select form-select-sm" id="foot_width" name="foot_width" required>
                                    <option value="広め"
                                        {{ isset($user) && $user->foot_width == '広め' ? 'selected' : '' }}>広め</option>
                                    <option value="ふつう"
                                        {{ isset($user) && $user->foot_width == 'ふつう' ? 'selected' : '' }}>ふつう</option>
                                    <option value="狭め"
                                        {{ isset($user) && $user->foot_width == '狭め' ? 'selected' : '' }}>狭め</option>
                                </select>
                                @error('foot_width')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="foot_height">甲の高さ</label>
                                <select class="form-select form-select-sm" id="foot_height" name="foot_height" required>
                                    <option value="高め"
                                        {{ isset($user) && $user->foot_height == '高め' ? 'selected' : '' }}>高め</option>
                                    <option value="ふつう"
                                        {{ isset($user) && $user->foot_height == 'ふつう' ? 'selected' : '' }}>ふつう</option>
                                    <option value="低め"
                                        {{ isset($user) && $user->foot_height == '低め' ? 'selected' : '' }}>低め</option>
                                </select>
                                @error('foot_height')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="mail_magazin">メルマガ購読</label>
                                <select class="form-select form-select-sm" id="mail_magazin" name="mail_magazin"
                                    required>
                                    <option value="する"
                                        {{ isset($user) && $user->mail_magazin == 'する' ? 'selected' : '' }}>する</option>
                                    <option value="しない"
                                        {{ isset($user) && $user->mail_magazin == 'しない' ? 'selected' : '' }}>しない</option>
                                </select>
                                @error('mail_magazin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="tos_confirm">利用規約</label>
                                <div class="form-check form-check-success mb-3">
                                    <input class="form-check-input" type="checkbox" name="tos_confirm"
                                        {{ isset($user) && $user->tos_confirm == 1 ? 'checked' : '' }}>
                                </div>
                                @error('tos_confirm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm"
                                    for="privacy_policy_confirm">プライバシーポリシーの</label>
                                <div class="form-check form-check-success mb-3">
                                    <input class="form-check-input" type="checkbox" name="privacy_policy_confirm"
                                        {{ isset($user) && $user->privacy_policy_confirm == 1 ? 'checked' : '' }}>
                                </div>
                                @error('privacy_policy_confirm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label col-form-label-sm" for="type">タイプ</label>
                                <select class="form-select form-select-sm" id="type" name="type"
                                    required>
                                    <option value="0" {{ isset($user) && $user->type == 0 ? 'selected' : '' }}>ユーザー
                                    </option>
                                    <option value="1" {{ isset($user) && $user->type == 1 ? 'selected' : '' }}>管理者
                                    </option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button class="btn btn-{{ isset($user) ? 'success' : 'primary' }}" type="submit">
                            {{ isset($user) ? '更新' : '登録' }}
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
