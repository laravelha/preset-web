<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        @include('layouts.header')

        <nav class="breadcrumb" role="navigation">
            <div class="container">
                @yield('breadcrumbs')
            </div>
        </nav>

        @if (session('message'))
            <div class="container message-wrap">
                <div class="row center-block">
                    <div class="col-md-12">
                        <div class="alert alert-{{session('type')}} alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>@lang('app.'.session('type'))</strong> {{ session('message') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div id="conteudo" class="container">
            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}" ></script>

        @stack('scripts')
    </body>
</html>
