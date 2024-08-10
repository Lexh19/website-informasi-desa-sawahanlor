<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homes = Home::all();
        return view('welcome', compact('homes'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(HomeRequest $request)
    {
        $home = Home::create($request->validated());
        return response()->json($home, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $home = Home::findOrFail($id);
        return response()->json($home);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HomeRequest $request, $id)
    {
        $home = Home::findOrFail($id);
        $home->update($request->validated());
        return response()->json($home);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $home = Home::findOrFail($id);
        $home->delete();
        return response()->json(null, 204);
    }
}
