<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('check.public');
});

Route::get('/_check/auth', fn () => view('check.auth'));
Route::get('/_check/app', fn () => view('check.app'));
