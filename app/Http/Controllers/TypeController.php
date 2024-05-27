<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        
        return view('type.index', [
            'types' => $types,
            'resource' => 'types',
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
        $type = Type::find($id);
        
        return view('type.show', [
            'type' => $type,
        ]);
    }

    public function edit(string $id)
    {
        $type = Type::find($id);
        
        if (!$type) {
            return redirect()->route('type.index')->with('error', 'Type introuvable');
        }

        try {
            $this->authorize('update', $type);
        } catch (AuthorizationException $e) {
            return redirect()->route('type.index')->with('error', 'Vous n\'êtes pas autorisé à modifier ce type.');
        }

        return view('type.edit', [
            'type' => $type,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'type' => 'required|max:60'
        ]);

        $type = Type::find($id);
        $type->update($validated);

        return view('type.show', [
            'type' => $type,
        ]);
    }

    public function destroy(string $id)
    {
        //
    }
}
