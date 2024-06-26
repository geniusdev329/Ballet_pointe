@extends('admin.layouts.master')
@section('title')
    ブログ
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
            管理者
        @endslot
        @slot('title')
            ブログ
        @endslot
    @endcomponent
    <form class="needs-validation {{ $errors->any() ? 'was-validated' : '' }}"
        action="{{ isset($blog) ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}" method="POST"
        enctype="multipart/form-data" novalidate>
        @csrf
        @if (isset($blog))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">ブログギャラリー</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">ブログ画像</h5>
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute top-100 start-100 translate-middle">
                                        <label for="blog-image-input" class="mb-0" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs">
                                                <div
                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" id="blog-image-input" type="file"
                                            accept="image/png, image/gif, image/jpeg" name="blog_img">
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded">
                                            <img src="{{ isset($blog) ? URL::asset('images/blogs/' . $blog->image) : '' }}"
                                                id="blog-img" class="avatar-md h-auto" />
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
                            <label class="form-label" for="title">タイトル</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ isset($blog) ? old('title', $blog->title) : old('title') }}" placeholder="" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label>内容</label>
                            <div id="quill-editor" class="snow-editor" style="height: 300px;"></div>
                            <input type="hidden" name="content" id="quill-content">
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="text-center mt-3">
                    <button class="btn btn-primary" type="submit">
                        {{ isset($blog) ? __('保管') : __('追加') }}
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        // blog image
        document.querySelector("#blog-image-input").addEventListener("change", function() {
            var preview = document.querySelector("#blog-img");
            var file = document.querySelector("#blog-image-input").files[0];
            var reader = new FileReader();
            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);
            if (file) {
                reader.readAsDataURL(file);
            }
        });
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
                var initialContent = {!! json_encode(old('content', $blog->html_content ?? '')) !!};
                quill.root.innerHTML = initialContent;
                quill.on('text-change', function() {
                    console.log(quill.root.innerHTML);
                    document.getElementById('quill-content').value = quill.root.innerHTML;
                });
            });
        }
    </script>
@endsection
