<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representation;
use Carbon\Carbon;
use App\Models\Show;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Location;

class RepresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $representations = Representation::all();
        
        return view('representation.index',[
            'representations' => $representations,
            'resource' => 'représentations',
        ]);
    } 

    public function create($showId)
    {
        $show = Show::findOrFail($showId);
        $locations = Location::all();
        return view('representation.create', compact('show', 'locations'));
    }

    public function store(Request $request, $showId)
    {
        $validatedData = $request->validate([
            'when' => 'required|date',
            'location_id' => 'required|exists:locations,id',
        ]);

        $representation = new Representation();
        $representation->when = $validatedData['when'];
        $representation->location_id = $validatedData['location_id'];
        $representation->show_id = $showId;
        $representation->save();

        return redirect()->route('show.show', $showId)->with('success', 'Représentation ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $representation = Representation::find($id);
        $date = Carbon::parse($representation->when)->format('d/m/Y');
        $time = Carbon::parse($representation->when)->format('G:i');
        
        return view('representation.show',[
            'representation' => $representation,
            'date' => $date,
            'time' => $time,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $representation = Representation::findOrFail($id);
        $showId = $representation->show_id;
        $representation->delete();

        return redirect()->route('show.show', $showId)->with('success', 'Représentation supprimée avec succès.');
    }
    

    public function reservation(string $id)
    {
        $show = Show::find($id);
        $representation = Representation::find($id);
    
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        return view('representation.reservation', [
            'show' => $show,
            'representation' => $representation,
        ]);
    }

    public function handlePayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $amount = $request->num_tickets * $request->price_per_ticket * 100; 
        $paymentMethod = $request->payment_method;
        $returnUrl = route('payment.success'); 

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'eur',
                'payment_method' => $paymentMethod,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => $returnUrl,
            ]);

            return response()->json([
                'success' => true,
                'paymentIntent' => $paymentIntent,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }

        public function paymentSuccess()
    {
        return view('payment.succes'); 
    }


    public function book(Request $request,string $id)
    {

        $representation = Representation::find($id);
        $date = Carbon::parse($representation->when)->format('d/m/Y');
        $time = Carbon::parse($representation->when)->format('H:i');
        
        return view('representation.book',[
            'representation' => $representation,
            'date' => $date,
            'time' => $time,
        ]);
    }
}
