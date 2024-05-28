<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::all();
        
        return view('show.index', [
            'shows' => $shows,
            'resource' => 'spectacles',
        ]);
    }

    /**
     * Search for a show by title.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $shows = Show::where('title', 'LIKE', "%{$query}%")->get();
        } else {
            $shows = Show::all();
        }

        return view('show.index', [
            'shows' => $shows,
            'resource' => 'spectacles',
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $show = Show::create($validatedData);

        return response()->json($show, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $show = Show::with('artistTypes.artist')->find($id);
    
        if (!$show) {
            return response()->view('errors.404', [], 404);
        }
        
        return view('show.show', [
            'show' => $show,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'date' => 'sometimes|required|date',
            'location' => 'sometimes|required|string|max:255',
        ]);

        $show = Show::findOrFail($id);
        $show->update($validatedData);

        return response()->json($show, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $show = Show::findOrFail($id);
        $show->delete();

        return response()->json(null, 204);
    }
}

