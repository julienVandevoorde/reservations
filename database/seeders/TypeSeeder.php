<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer toutes les données existantes dans la table
        Type::query()->delete();
        
        // Définir les données à insérer
        $types = [
            ['type' => 'comédien'],
            ['type' => 'scénographe'],
            ['type' => 'auteur'],
        ];
        
        // Insérer les données dans la table
        foreach ($types as $typeData) {
            // Créer une nouvelle instance du modèle Type avec les données
            $type = new Type($typeData);
            // Enregistrer le nouveau type dans la base de données
            $type->save();
        }
    }
}
