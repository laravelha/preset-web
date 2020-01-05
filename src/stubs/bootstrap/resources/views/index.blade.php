@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('index'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">@lang('app.welcome')</h1>
                    <p class="lead">@lang('app.lead')</p>
                    <hr class="my-4">
                    <p>@lang('app.madeWithLaravel')</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="https://github.com/laravelha" target="_blank" role="button">@lang('app.readMore')</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
