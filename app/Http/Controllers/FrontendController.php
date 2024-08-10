<?php

namespace App\Http\Controllers;

use App\Models\home;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $home=home::where('status','active')->limit(3)->orderBy('id')->get();

        return view('frontend.index')

            ->with('home',$home);
    }
}
