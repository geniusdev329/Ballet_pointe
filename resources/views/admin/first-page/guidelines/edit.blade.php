@extends('admin.layouts.master')

@section('content')
    @include('admin.first-page.guidelines.create', ['guideline' => $guideline])
@endsection