@extends('admin.layouts.master')
@section('title')
商品ロコミ管理
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">商品ロコミ管理</h5>
                </div>
                <div class="card-body">
                    <table id="projectReviewDatatable" class="table nowrap dt-responsive align-middle table-hover table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>商品名</th>
                                <th>投稿日時</th>
                                <th>ステータス</th>
                                <th>投稿者</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_reviews as $index => $product_review)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product_review->id }}</td>
                                    <td>{{ $product_review->product->name }}</td>
                                    <td>{{ $product_review->created_at->format("Y年 n月 j日") }}</td>
                                    <td>{{ $product_review->status }}</td>
                                    <td>{{ $product_review->user->nickname }}</td>
                                    <td class="text-center">
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.product-reviews.edit', $product_review->id) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>ショー</a>
                                                </li>
                                                <li><a href="{{ route('admin.product-reviews.edit', $product_review->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>編集</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.product-reviews.destroy', $product_review->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item remove-item-btn"
                                                            onclick="return confirm('本当にこの記録を削除しますか？')">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            削除
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#projectReviewDatatable', {
                "pagingType": "full_numbers",
                language: {
                    processing: "処理中...",
                    lengthMenu: "_MENU_ 件表示",
                    zeroRecords: "記録は見つかりませんでした",
                    info: "_TOTAL_ 件中 _START_ から _END_ まで表示",
                    infoEmpty: "0 件中 0 から 0 まで表示",
                    infoFiltered: "(全 _MAX_ 件より抽出)",
                    search: "検索:",
                    paginate: {
                        first: "先頭",
                        previous: "前",
                        next: "次",
                        last: "最終"
                    }
                }
            });
        });
    </script>
@endsection
