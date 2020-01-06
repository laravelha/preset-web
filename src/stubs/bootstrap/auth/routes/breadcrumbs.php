<?php

use \Illuminate\Support\Facades\Lang;

Breadcrumbs::for('index', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('app.index'), route('index'));
});

Breadcrumbs::for('home', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('app.home'), route('home'));
});

Breadcrumbs::for('login', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('login'), route('login'));
});

Breadcrumbs::for('logout', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('logout'), route('logout'));
});

Breadcrumbs::for('register', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('register'), route('register'));
});

Breadcrumbs::for('password.confirm', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('password.confirm'), route('password.confirm'));
});

Breadcrumbs::for('password.email', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('password.email'), route('password.email'));
});

Breadcrumbs::for('password.reset', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('password.reset'), route('password.reset'));
});
