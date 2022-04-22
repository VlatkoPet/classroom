<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <title>{{ config('app.name', 'classroom') }}</title>

    @include('layouts.main_styles')

</head>
<body>
    <div class="container">
 

    </div>

    @yield('content')


        <!--Scripts-->
    @include('layouts.main_scripts')
    @yield('scripts')


</body>

</html>
