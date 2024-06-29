@extends('admin.layouts.master')
@section('title')
    メーカー管理
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .was-validated .invalid-feedback {
            display: block;
        }
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            メーカー管理
        @endslot
        @slot('title')
            メーカー管理
        @endslot
    @endcomponent
    <form class="needs-validation {{ $errors->any() ? 'was-validated' : '' }}"
        action="{{ isset($maker) ? route('admin.makers.update', $maker->id) : route('admin.makers.store') }}" method="POST"
        enctype="multipart/form-data" novalidate>
        @csrf
        @if (isset($maker))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-lg-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">メーカー管理</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">商品画像</h5>
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute top-100 start-100 translate-middle">
                                        <label for="maker-image-input" class="mb-0" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs">
                                                <div
                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" id="maker-image-input" type="file"
                                            accept="image/png, image/gif, image/jpeg" name="maker_img">
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded">
                                            <img src="{{ isset($maker) ? URL::asset('images/maker_logos/' . $maker->logo_img) : '' }}"
                                                id="maker-img" class="avatar-md h-auto" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">メーカー名</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ isset($maker) ? old('name', $maker->name) : old('name') }}" placeholder=""
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-14 mb-1">メーカータイプ</h5>
                            <select class="form-control" name="type">
                                <option value="0"
                                    {{ (isset($maker) && $maker->type == 0) || old('type') == 0 ? 'selected' : '' }}>国内メーカー
                                </option>
                                <option value="1"
                                    {{ (isset($maker) && $maker->type == 1) || old('type') == 1 ? 'selected' : '' }}>海外メーカー
                                </option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-primary" type="submit">
                        {{ isset($maker) ? __('確認') : __('追加') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('build/libs/quill/quill.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        // maker logo image
        document.querySelector("#maker-image-input").addEventListener("change", function() {
            var preview = document.querySelector("#maker-img");
            var file = document.querySelector("#maker-image-input").files[0];
            var reader = new FileReader();
            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);
            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
