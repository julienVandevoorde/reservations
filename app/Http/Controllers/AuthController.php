<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLoginForm() {
        return view('auth.login');
    }

    // Traite la connexion de l'utilisateur
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Ajout d'un message flash avec une approche alternative
            session()->flash('status', 'Vous êtes connecté');
    
            return redirect()->route('welcome');
        }
    
        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ]);
    }
    

    // Affiche le formulaire d'inscription
    public function showRegistrationForm() {
        return view('auth.register');
    }

    // Traite l'inscription de l'utilisateur
    public function register(Request $request) {
        $request->validate([
            'login' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('welcome');
    }

    // Déconnecte l'utilisateur
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
