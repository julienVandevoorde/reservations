<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Location;
use App\Models\Show;

class ShowSeeder extends Seeder
{
   
    
    public function run()
    {
        

    DB::statement('SET FOREIGN_KEY_CHECKS=0');

    Show::truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1');


        // Définir les données à insérer
        $shows = [
            [
                'slug' => 'ayiti',
                'title' => 'Ayiti',
                'description' => "Un homme est bloqué à l’aéroport.\n "
                    . 'Questionné par les douaniers, il doit alors justifier son identité, '
                    . 'et surtout prouver qu\'il est haïtien – qu\'est-ce qu\'être haïtien ?',
                'poster_url' => 'ayiti.jpg',
                'location_id' => '1',
                'bookable' => true,
                'price' => 8.50,
            ],
            [
                'slug' => 'cible',
                'title' => 'Cible mouvante',
                'description' => 'Dans ce « thriller d’anticipation », des adultes semblent alimenter '
                    . 'et véhiculer une crainte féroce envers les enfants âgés entre 10 et 12 ans.',
                'poster_url' => 'cible.jpg',
                'location_id' => '2',
                'bookable' => true,
                'price' => 9.00,
            ],
            [
                'slug' => 'claudebelgesaison220',
                'title' => 'Ceci n\'est pas un chanteur belge',
                'description' => "Non peut-être ?!\nEntre Magritte (pour le surréalisme comique) "
                    . 'et Maigret (pour le réalisme mélancolique), ce dixième opus semalien propose '
                    . 'quatorze nouvelles chansons mêlées à de petits textes humoristiques et '
                    . 'à quelques fortes images poétiques.',
                'poster_url' => 'claudebelgesaison220.jpg',
                'location_id' => '3',
                'bookable' => false,
                'price' => 5.50,
            ],
            [
                'slug' => 'wayburn',
                'title' => 'Manneke… !',
                'description' => 'A tour de rôle, Pierre se joue de ses oncles, '
                    . 'tantes, grands-parents et surtout de sa mère.',
                'poster_url' => 'wayburn.jpg',
                'location_id' => '1',
                'bookable' => true,
                'price' => 10.50,
            ],
        ];

        foreach ($shows as $showData) {
            
            DB::table('shows')->insert([
                'slug' => $showData['slug'],
                'title' => $showData['title'],
                'description' => $showData['description'],
                'poster_url' => $showData['poster_url'],
                'location_id' => $showData['location_id'],
                'bookable' => $showData['bookable'],
                'price' => $showData['price'],
            ]);
        }
    }
}

