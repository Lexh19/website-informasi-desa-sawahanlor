<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Servis;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        $home = Home::where('status', 'active')
                    ->limit(3)
                    ->orderBy('id')
                    ->get();


        $serviss = Servis::all();

        return view('frontend.index')
            ->with('home', $home)
            ->with('serviss', $serviss);
    }
}
