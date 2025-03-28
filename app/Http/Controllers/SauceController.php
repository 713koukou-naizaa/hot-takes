<?php

namespace App\Http\Controllers;

use App\Models\Sauce;
use Illuminate\Http\Request;

class SauceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(/*Request $request*/)
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
            'heat' => 'required|integer|min:1|max:10',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif',
        ]);
    
        $sauceData = $validated;
    
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $sauceData['imageUrl'] = $request->file('image')->store('images', 'public');
        }
    
        $sauce = Sauce::create($sauceData);
    
        return response()->json(['message' => 'Sauce created successfully', 'sauce' => $sauce], 201);
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
        if ($request->has('sauce')) {
            $sauceData = json_decode($request->input('sauce'), true);
            $sauce->update($sauceData);
        }
    
        if ($request->hasFile('image')) {
            $sauce->imageUrl = $request->file('image')->store('images', 'public');
            $sauce->save();
        }
    
        return response()->json(['message' => 'Sauce updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sauce $sauce)
    {
        $sauce->delete();
        return response()->json(['message' => 'Sauce deleted successfully']);
    }

    public function like(Request $request, $id)
{
    $validated = $request->validate([
        'userId' => 'required|string',
        'like' => 'required|integer|in:-1,0,1',
    ]);

    $sauce = Sauce::findOrFail($id);

    if ($validated['like'] === 1) {
        if (!in_array($validated['userId'], $sauce->usersLiked)) {
            $sauce->usersLiked = array_merge($sauce->usersLiked ?? [], [$validated['userId']]);
            $sauce->likes++;
        }
    } elseif ($validated['like'] === -1) {
        if (!in_array($validated['userId'], $sauce->usersDisliked)) {
            $sauce->usersDisliked = array_merge($sauce->usersDisliked ?? [], [$validated['userId']]);
            $sauce->dislikes++;
        }
    } else {
        $sauce->usersLiked = array_diff($sauce->usersLiked ?? [], [$validated['userId']]);
        $sauce->usersDisliked = array_diff($sauce->usersDisliked ?? [], [$validated['userId']]);
        $sauce->likes = count($sauce->usersLiked);
        $sauce->dislikes = count($sauce->usersDisliked);
    }

    $sauce->save();

    return response()->json(['message' => 'Sauce like/dislike updated successfully']);
}
}
