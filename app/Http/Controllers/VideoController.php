<?php

namespace App\Http\Controllers;


use App\Models\Show;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\VideoController;



class VideoController extends Controller
{
    
    public function create($show_id)
{
    if (!auth()->check() || !auth()->user()->isAdmin()) {
        return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
    }

    $show = Show::findOrFail($show_id);

    if (!$show->representations()->exists()) {
        return redirect()->back()->with('error', 'Vous ne pouvez pas ajouter de vidéo pour un spectacle sans représentation.');
    }

    return view('video.create', ['show' => $show]);
}


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'show_id' => 'required|exists:shows,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
        ]);

        $show = Show::findOrFail($validatedData['show_id']);

        $video = new Video();
        $video->title = $validatedData['title'];
        $video->video_url = $validatedData['video_url'];

        $show->videos()->save($video);

        return redirect()->back()->with('success', 'La vidéo a été ajoutée avec succès au spectacle.');
    }

}
