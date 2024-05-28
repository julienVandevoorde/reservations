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
        $shows = Show::simplePaginate(2); 
        
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
        $shows = Show::where('title', 'LIKE', "%{$query}%")->simplePaginate(2); 
    } else {
        $shows = Show::paginate(2); 
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

    public function create()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
        return view('show.create');
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
    public function destroy($id)
    {
        $show = Show::find($id);

        if (!$show) {
            return response()->json(['message' => 'Show not found'], 404);
        }

        $show->delete();

        return response()->json(null, 204);
    }
}

