<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/database', function () {
    return DB::table('users')->get();
});

Route::get('/cache', function () {
    // count the number of times the route has been visited

    $visits = Cache::get('visits', 0);

    Cache::put('visits', $visits + 1);

    return [
        'visits' => $visits
    ];
});

