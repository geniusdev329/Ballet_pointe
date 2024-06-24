@extends('admin.layouts.master')

@section('content')
    @include('admin.first-page.tou.create', ['tou' => $tou])
@endsection