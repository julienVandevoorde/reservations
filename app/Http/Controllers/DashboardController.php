<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;


class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect()->route('welcome');
        }   
        // Exclure l'utilisateur actuellement connecté
        $users = User::where('id', '!=', auth()->id())->get();
    
        return view('dashboard.index', compact('users'));
    }
    public function edit(User $user)
    {
        return view('dashboard.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'login' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'langue' => 'required|string|max:2',
        ]);
    
        $user->update($request->all());
    
        return redirect()->route('dashboard.index')->with('success', 'User updated successfully');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }


    // Exporter les utilisateurs au format CSV
    public function exportUsersCsv()
    {
        $fileName = 'users.csv';
        $users = User::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = ['ID', 'Login', 'Firstname', 'Lastname', 'Email', 'Langue'];

        $callback = function() use($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->login,
                    $user->firstname,
                    $user->lastname,
                    $user->email,
                    $user->langue
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    
    
}
