<?php

namespace App\Http\Controllers;


use App\Models\servis;
use Illuminate\Http\Request;
use App\Http\Requests\ServisRequest;

class servisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviss = servis::all();
        return view('welcome', compact('serviss'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServisRequest $request)
    {
        $servis = servis::create($request->validated());
        return response()->json($servis, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $servis = servis::findOrFail($id);
        return response()->json($servis);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServisRequest $request, $id)
    {
        $servis = servis::findOrFail($id);
        $servis->update($request->validated());
        return response()->json($servis);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servis = servis::findOrFail($id);
        $servis->delete();
        return response()->json(null, 204);
    }
}
