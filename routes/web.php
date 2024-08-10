<?php

use App\Models\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $homes = Home::all();
    return view('welcome', ['homes' => $homes]);
});
