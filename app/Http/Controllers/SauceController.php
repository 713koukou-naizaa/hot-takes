<?php

namespace App\Http\Controllers;

use App\Models\Sauce;
use Illuminate\Http\Request;

class SauceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sauces = Sauce::all();
        return response()->json($sauces);

/*         if ($request->wantsJson()) {
            return response()->json($sauces);
        }
    
        return view('sauces.index', compact('sauces')); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sauces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'userId' => 'required|string',
            'name' => 'required|string',
            'manufacturer' => 'required|string',
            'description' => 'required|string',
            'mainPepper' => 'required|string',
            'imageUrl' => 'required|string',
            'heat' => 'required|integer|min:1|max:10',
        ]);

        $sauce = Sauce::create($validated);
        return response()->json($sauce, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sauce $sauce)
    {
        return response()->json($sauce);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sauce $sauce)
    {
        $validated = $request->validate([
            'name' => 'string',
            'manufacturer' => 'string',
            'description' => 'string',
            'mainPepper' => 'string',
            'imageUrl' => 'string',
            'heat' => 'integer|min:1|max:10',
        ]);

        $sauce->update($validated);
        return response()->json($sauce);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sauce $sauce)
    {
        $sauce->delete();
        return response()->json(['message' => 'Sauce deleted successfully']);
    }
}
