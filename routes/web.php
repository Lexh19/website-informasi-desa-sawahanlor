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
use Fruitcake\Cors\HandleCors;

Route::middleware([HandleCors::class])->group(function () {
    Route::get('/storage/{filename}', function ($filename) {
        // Rute untuk mengakses file gambar di storage
        $path = storage_path('app/public/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    });
    // Tambahkan rute lain yang perlu CORS di sini
});
