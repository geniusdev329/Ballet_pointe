@extends('admin.layouts.master')

@section('content')
    @include('admin.users.create', ['user' => $user])
@endsection