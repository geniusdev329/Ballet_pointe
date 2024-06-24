@extends('admin.layouts.master')

@section('content')
    @include('admin.first-page.faq.create', ['faq' => $faq])
@endsection