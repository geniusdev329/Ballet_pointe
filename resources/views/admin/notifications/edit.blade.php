@extends('admin.layouts.master')

@section('content')
    @include('admin.notifications.create', ['notification' => $notification])
@endsection