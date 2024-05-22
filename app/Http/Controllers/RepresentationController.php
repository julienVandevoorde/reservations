<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representation;
use Carbon\Carbon;
use App\Models\Show;
use Stripe\Stripe;
use Stripe\PaymentIntent;

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
<<<<<<< HEAD
    

    public function reservation(string $id)
    {
        $show = Show::find($id);
        $representation = Representation::find($id);
    
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
=======

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
>>>>>>> 1fc54391aa747ee74d8771c4b295bdf89f33fcd6
}
