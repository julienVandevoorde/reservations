<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use Illuminate\Support\Str;
use App\Models\Location;

class ShowController extends Controller
{
    public function index()
    {
        $shows = Show::simplePaginate(4); 
        
        return view('show.index', [
            'shows' => $shows,
            'resource' => 'spectacles',
        ]);
    }

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


    public function create()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    
        $locations = Location::all(); 
    
        return view('show.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location_id' => 'required|exists:locations,id', 
            'poster_url' => 'nullable|url',
            'price' => 'required|numeric',
            'bookable' => 'sometimes|boolean',
        ]);

        $validatedData['bookable'] = $request->has('bookable') ? $request->input('bookable') : false;

        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $show = Show::create($validatedData);

        return response()->json($show, 201);
    }



    public function show($id)
    {
        $show = Show::with('artistTypes.artist')->find($id);

        if (!$show) {
            return response()->view('errors.404', [], 404);
        }

        $videos = $show->videos; 

        return view('show.show', [
            'show' => $show,
            'videos' => $videos, 
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'date' => 'sometimes|required|date',
            'location' => 'sometimes|required|string|max:255',
            'bookable' => 'sometimes|required|boolean',
        ]);

        $show = Show::findOrFail($id);
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');
        $show->update($validatedData);

        return response()->json($show, 200);
    }

    public function destroy($id)
    {
        $show = Show::findOrFail($id);
        $show->delete();

        return redirect()->route('show.index')->with('success', 'Le spectacle a été supprimé avec succès.');
    }
}


