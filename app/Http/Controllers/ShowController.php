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
        
        return view('show.index',[
            'shows' => $shows,
            'resource' => 'spectacles',
        ]);
    }

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
        $show = Show::find($id);
    
        if (!$show) {
            
            return response()->view('errors.404', [], 404);
        }

        $collaborateurs = [];

        if ($show->artistTypes) {
            foreach ($show->artistTypes as $at) {
                $collaborateurs[$at->type->type][] = $at->artist;
            }
        }
    
        return view('show.show',[
            'show' => $show,
            'collaborateurs' => $collaborateurs,
        ]);    
    }
    



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
