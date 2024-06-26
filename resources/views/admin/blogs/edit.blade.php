@extends('admin.layouts.master')

@section('content')
    @include('admin.blogs.create', ['blog' => $blog])
@endsection