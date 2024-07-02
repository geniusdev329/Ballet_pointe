@extends('admin.layouts.master')
@section('title')
    利用規約登録
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
            利用規約登録
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">利用規約登録</h4>
                    <div>
                        <a href="{{ route('admin.first-page.privacy-policies.index') }}" class="btn btn-info">一覧に戻る</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="needs-validation {{ $errors->any() ? 'was-validated' : '' }}" id="touForm" method="POST"
                        action="{{ isset($privacy_policy) ? route('admin.first-page.privacy-policies.update', $privacy_policy->id) : route('admin.first-page.privacy-policies.store') }}"
                        novalidate>
                        @csrf
                        @if (isset($privacy_policy))
                            @method('PUT')
                        @endif
                        <div class="row mb-3">
                            <div class="col-lg-2 text-end">
                                <label for="html_content" class="form-label">内容: </label>
                            </div>
                            <div class="col-lg-8">
                                <textarea name="html_content" id="html_content">{{ isset($privacy_policy) ? old('html_content', $privacy_policy->html_content) : old('html_content') }}</textarea>
                                @error('html_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2 text-end">
                                <label for="status" class="form-label">ステータス: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-check form-switch form-switch-lg" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="flexSwitchCheckDefault" name="status" {{ isset($privacy_policy) && ($privacy_policy->status == 1) ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button class="btn btn-primary" type="submit">
                                {{ isset($privacy_policy) ? __('確認') : __('追加') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#html_content'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
