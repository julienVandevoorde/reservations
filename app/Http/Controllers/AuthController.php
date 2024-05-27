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
        $messages = [
            'login.required' => 'Le champ login est obligatoire.',
            'firstname.required' => 'Le champ prénom est obligatoire.',
            'lastname.required' => 'Le champ nom est obligatoire.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'L\'adresse email doit être une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'langue.required' => 'Le choix de la langue est obligatoire.',
        ];
    
        $request->validate([
            'login' => 'required|string|max:30',
            'firstname' => 'required|string|max:60',
            'lastname' => 'required|string|max:60',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'langue' => 'required|string|max:2'
        ], $messages);
    
        $user = User::create([
            'login' => $request->login,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'langue' => $request->langue,
            'password' => Hash::make($request->password),
        ]);
    
        Auth::login($user);
        //message de bienvenue
        session()->flash('welcome', 'Bienvenue, ' . $user->firstname . '! Votre compte a été créé avec succès.');
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
