<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        
        return view('location.index', [
            'locations' => $locations,
            'resource' => 'lieux',
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $location = Location::find($id);
        
        return view('location.show', [
            'location' => $location,
        ]);
    }

    public function edit($id)
    {
        if (!auth()->check()) {
            return redirect()->route('location.index')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        $location = Location::find($id);
        
        if (!$location) {
            return redirect()->route('location.index')->with('error', 'Lieu de spectacle non trouvé');
        }

        if (!auth()->user()->isAdmin()) {
            return redirect()->route('location.index')->with('error', 'Vous n\'avez pas les autorisations nécessaires pour accéder à cette page.');
        }

        return view('location.edit', compact('location'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'postal_code' => 'required|max:6',
            'locality' => 'required|max:60',
        ]);
    
        $location = Location::find($id);    

        $location->update($validated);
        
        return view('location.show', [
            'location' => $location,
        ]);
    }

    public function destroy(string $id)
    {
        //
    }
}
