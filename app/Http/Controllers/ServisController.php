<?php
namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function index()
    {
        $serviss = Servis::all();
        return response()->json($serviss);
    }
}
