<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer toutes les données existantes dans la table
        Role::query()->delete();

        // Définir les données à insérer
        $roles = [
            ['role' => 'admin'],
            ['role' => 'user'],
        ];

        // Insérer les données dans la table
        foreach ($roles as $roleData) {
            // Créer une nouvelle instance du modèle Role avec les données
            $role = new Role($roleData);
            // Enregistrer le nouveau rôle dans la base de données
            $role->save();
        }
    }
}
