<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Representation;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'login' => 'adminuser',
                'password' => bcrypt('password123'),
                'firstname' => 'Admin',
                'lastname' => 'User',
                'email' => 'admin@example.com',
                'langue' => 'fr',
            ],
            [
                'login' => 'editoruser',
                'password' => bcrypt('password123'),
                'firstname' => 'Editor',
                'lastname' => 'User',
                'email' => 'editor@example.com',
                'langue' => 'en',
            ],
            [
                'login' => 'vieweruser',
                'password' => bcrypt('password123'),
                'firstname' => 'Viewer',
                'lastname' => 'User',
                'email' => 'viewer@example.com',
                'langue' => 'fr',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
        
            $role = Role::where('role', 'admin')->first();
            if ($role) {
                $user->roles()->attach($role);
            }
        
            // Sélectionner toutes les représentations
            $representations = Representation::all();
        
            // Sélectionner entre 1 et 4 représentations aléatoirement
            $randomRepresentations = $representations->random(mt_rand(1, 4));
        
            // Attacher les représentations à l'utilisateur
            $user->representations()->attach($randomRepresentations->pluck('id'));
        }
        
    }   
}