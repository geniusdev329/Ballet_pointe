@extends('admin.layouts.master')

@section('content')
    @include('admin.makers.create', ['maker' => $maker])
@endsection