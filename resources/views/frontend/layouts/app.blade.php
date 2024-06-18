<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title')| My Point </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('frontend.layouts.head-css')
</head>
@section('body')
    @include('frontend.layouts.body')
@show
@include('frontend.layouts.header')
<main class="p-main">
    @yield('content')
</main>
@include('frontend.layouts.footer')

@include('frontend.layouts.vendor-scripts')
</body>
</html>
