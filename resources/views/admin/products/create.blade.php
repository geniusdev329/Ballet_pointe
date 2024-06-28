@extends('admin.layouts.master')
@section('title')
    商品管理
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
            Ecommerce
        @endslot
        @slot('title')
            商品管理
        @endslot
    @endcomponent
    <form class="needs-validation {{ $errors->any() ? 'was-validated' : '' }}"
        action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
        method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        @if (isset($product))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">商品ギャラリー</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">商品画像</h5>
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute top-100 start-100 translate-middle">
                                        <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs">
                                                <div
                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" id="product-image-input" type="file"
                                            accept="image/png, image/gif, image/jpeg" name="product_img">
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded">
                                            <img src="{{ isset($product) ? URL::asset('images/products/' . $product->image) : '' }}"
                                                id="product-img" class="avatar-md h-auto" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">ステータス</h5>
                            <select class="form-control" name="status">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">商品名</label>
                            <input type="text" class="form-control" id="product_name" name="name"
                                value="{{ isset($product) ? old('name', $product->name) : old('name') }}" placeholder=""
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label>商品説明</label>
                            <div id="quill-editor" class="snow-editor" style="height: 300px;"></div>
                            <input type="hidden" name="description" id="quill-content">
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="maker_id">メーカー名</label>
                            <select class="form-select form-select-sm" id="maker_id" name="maker_id" required>
                                @foreach ($makers as $maker)
                                    <option value="{{ $maker->id }}"
                                        {{ isset($product) && $maker->maker_id == $maker->id ? 'selected' : '' }}>
                                        {{ $maker->name }}</option>
                                @endforeach
                            </select>
                            @error('maker_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="rakuten_link">楽天で</label>
                            <input type="text" class="form-control" id="rakuten_link" name="rakuten_link"
                                value="{{ isset($product) ? old('rakuten_link', $product->rakuten_link) : old('rakuten_link') }}"
                                placeholder="" required>
                            @error('rakuten_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="amazon_link">amazon</label>
                            <input type="text" class="form-control" id="amazon_link" name="amazon_link"
                                value="{{ isset($product) ? old('amazon_link', $product->amazon_link) : old('amazon_link') }}"
                                placeholder="" required>
                            @error('amazon_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="yahoo_link">yahoo</label>
                            <input type="text" class="form-control" id="yahoo_link" name="yahoo_link"
                                value="{{ isset($product) ? old('yahoo_link', $product->amazon_link) : old('yahoo_link') }}"
                                placeholder="" required>
                            @error('yahoo_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="text-center mt-3">
                    <button class="btn btn-primary" type="submit">
                        {{ isset($product) ? __('保管') : __('追加') }}
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
        // Snow theme
        var snowEditor = document.querySelectorAll(".snow-editor");
        if (snowEditor) {
            Array.from(snowEditor).forEach(function(item) {
                var snowEditorData = {};
                var issnowEditorVal = item.classList.contains("snow-editor");
                if (issnowEditorVal == true) {
                    snowEditorData.theme = 'snow',
                        snowEditorData.modules = {
                            'toolbar': [
                                [{
                                    'font': []
                                }, {
                                    'size': []
                                }],
                                ['bold', 'italic', 'underline', 'strike'],
                                [{
                                    'color': []
                                }, {
                                    'background': []
                                }],
                                [{
                                    'script': 'super'
                                }, {
                                    'script': 'sub'
                                }],
                                [{
                                    'header': [false, 1, 2, 3, 4, 5, 6]
                                }, 'blockquote', 'code-block'],
                                [{
                                    'list': 'ordered'
                                }, {
                                    'list': 'bullet'
                                }, {
                                    'indent': '-1'
                                }, {
                                    'indent': '+1'
                                }],
                                ['direction', {
                                    'align': []
                                }],
                                ['link', 'image', 'video'],
                                ['clean']
                            ]
                        }
                }
                var quill = new Quill(item, snowEditorData);
                // Set initial content if available
                var initialContent = {!! json_encode(old('description', $product->html_description ?? '')) !!};
                quill.root.innerHTML = initialContent;
                quill.on('text-change', function() {
                    document.getElementById('quill-content').value = quill.root.innerHTML;
                });
            });
        }
    </script>
@endsection
