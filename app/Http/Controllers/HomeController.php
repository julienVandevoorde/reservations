<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;

class HomeController extends Controller
{
    public function index()
    {
        
        $shows = Show::take(2)->get();

        
        return view('welcome', [
            'shows' => $shows,
        ]);
    }
}
