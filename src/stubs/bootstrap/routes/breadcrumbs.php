<?php

use \Illuminate\Support\Facades\Lang;

Breadcrumbs::for('index', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('app.index'), route('index'));
});
