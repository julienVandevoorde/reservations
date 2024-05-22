<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            
        ]);

        $representationId = $request->input('representation_id');
        $places = $request->input('places');
        $price = $request->input('price');
    
        $total = $places * $price;

        $representation = Representation::find($representationId);
    
        if (!$representation) {
            return redirect()->back()->with('error', 'La représentation sélectionnée est introuvable.');
        }
    
        return redirect()->route('reservation.pay', [
            'id' => $representation->show->id,
            'total' => $total
        ]);
    }

    public function pay(Request $request)
    {
        $payment = $request->user()->pay(
            $request->get('total'),
        );
        
        return $payment->client_secret;

        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
