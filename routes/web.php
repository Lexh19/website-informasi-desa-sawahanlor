<?php

use App\Models\Home;
use App\Models\About;
use App\Models\Servis;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $homes = Home::all();
    $serviss = Servis::all();
    $gallerys = Gallery::all();
    $abouts = About::all();


    return view('welcome', [
        'homes' => $homes,
        'serviss' => $serviss,
        'gallerys'=> $gallerys,
        'abouts'=> $abouts
    ]);
});
