<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        if (!auth()->check()) {
            return redirect()->route('welcome');
        }

        return view('dashboard.index', compact('users'));
    }
}
