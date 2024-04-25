<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        
        return view('location.index', [
            'locations' => $locations,
            'resource' => 'lieux',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::find($id);
        
        return view('location.show', [
            'location' => $location,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::find($id);
        
        if (!$location) {
            return redirect()->route('location.index')->with('error', 'Lieu non trouve');
        }

        return view('location.edit', [
            'location' => $location,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
