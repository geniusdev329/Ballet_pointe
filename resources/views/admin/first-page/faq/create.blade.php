@extends('admin.layouts.master')
@section('title')
サイト説明登録
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
サイト説明登録
@endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">サイト説明登録</h4>
                <div>
                    <a href="{{ route('admin.first-page.faq.index') }}" class="btn btn-info">一覧に戻る</a>
                </div>
            </div>
            <div class="card-body">
                <form class="needs-validation {{ $errors->any() ? 'was-validated' : '' }}" id="faq_form" method="POST" action="{{ isset($faq) ? route('admin.first-page.faq.update', $faq->id) : route('admin.first-page.faq.store') }}" novalidate>
                    @csrf
                    @if(isset($faq))
                    @method('PUT')
                    @endif
                    <div class="row mb-3">
                        <div class="col-lg-2 text-end">
                            <label for="title" class="form-label">タイトル: </label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="title" value="{{ isset($faq) ? old('title', $faq->title) : old('title') }}" placeholder="" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-2 text-end">
                            <label for="html_content" class="form-label">内容: </label>
                        </div>
                        <div class="col-lg-8">
                            <textarea name="html_content" id="html_content">{{ isset($faq) ? old('html_content', $faq->html_content) : old('html_content') }}</textarea>
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
                                <input type="checkbox" class="form-check-input" id="flexSwitchCheckDefault" name="status" {{ isset($faq) && ($faq->status == 1) ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button class="btn btn-primary" type="submit">
                            {{ isset($faq) ? __('保管') : __('追加') }}
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