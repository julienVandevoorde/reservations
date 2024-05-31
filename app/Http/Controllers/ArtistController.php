<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();

        return view('artist.index', [
            'artists' => $artists, 
        ]);
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('artist.index')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        if (!auth()->user()->isAdmin()) {
            return redirect()->route('artist.index')->with('error', 'Vous n\'avez pas les autorisations nécessaires pour accéder à cette page.');
        }

        return view('artist.create');
    }


    public function showVideos($artistName)
    {

        $artist = Artist::where('lastname', $artistName)->firstOrFail();

        $videos = $artist->shows()->with('videos')->get()->pluck('videos')->flatten();

        return view('artist.videos', ['artist' => $artist, 'videos' => $videos]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
        ]);

        $artist = new Artist();
        $artist->firstname = $validated['firstname'];
        $artist->lastname = $validated['lastname'];

        $artist->save();

        return redirect()->route('artist.index')->with('success', 'Artiste créé avec succès.');
    }

    public function show(string $id)
    {
        $artist = Artist::find($id);

        if (!$artist) {
            return redirect()->route('artist.index')->with('error', 'Artiste non trouvé');
        }

        return view('artist.show', [
            'artist' => $artist,
        ]);
    }

    public function edit(string $id)
    {
        if (!auth()->check()) {
            return redirect()->route('artist.index')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        $artist = Artist::find($id);
        
        if (!$artist) {
            return redirect()->route('artist.index')->with('error', 'Artiste non trouvé');
        }

        if (!auth()->user()->isAdmin()) {
            return redirect()->route('artist.index')->with('error', 'Vous n\'avez pas les autorisations nécessaires pour accéder à cette page.');
        }

        return view('artist.edit', [
            'artist' => $artist,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
        ]);

        $artist = Artist::find($id);

        $artist->update($validated);

        return view('artist.show', [
            'artist' => $artist,
        ]);
    }

    public function destroy($id)
    {
        Artist::destroy($id);

        return redirect()->route('artist.index');
    }
}
