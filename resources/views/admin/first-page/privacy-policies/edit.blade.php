@extends('admin.layouts.master')

@section('content')
    @include('admin.first-page.privacy-policies.create', ['privacy_policy' => $privacy_policy])
@endsection