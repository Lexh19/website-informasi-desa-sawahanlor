<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeRequest;
use App\Models\Home;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function store(HomeRequest $request)
    {
        Log::info('Request data:', $request->all());

        $home = new Home();
        $home->title = $request->input('title');
        $home->subtitle = $request->input('subtitle');

        if ($request->hasFile('img') && count($request->file('img')) > 0) {
            $paths = [];
            foreach ($request->file('img') as $image) {
                $paths[] = $image->store('images', 'public');
            }
            // Simpan paths sebagai string yang dipisahkan koma
            $home->img = implode(',', $paths);
            Log::info('Image paths:', $paths);
        } else {
            $home->img = ''; // Jika tidak ada gambar
        }

        Log::info('Home data before save:', [
            'title' => $home->title,
            'subtitle' => $home->subtitle,
            'img' => $home->img,
        ]);

        $home->save();

        return redirect()->route('homes.index')->with('success', 'Home created successfully.');
    }
}
