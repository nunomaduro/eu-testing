<?php

use App\Models\User;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/database', function () {
    $users = [];

    $benchmark = Benchmark::measure(function () use (&$users) {
        User::factory()->create();

        $users = DB::table('users')->count();
    });

    return [
        'users' => $users,
        'time' => $benchmark,
    ];
});

Route::get('/cache', function () {
    $visits = Cache::get('visits', 0);

    Cache::put('visits', $visits + 1);

    return [
        'visits' => $visits
    ];
});

