<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locality = [
            [
                'postal_code' => '1070',
                'locality' => 'Bruxelles-Capitale',
            ],
            [
                'postal_code' => '1480',
                'locality' => 'Tubize',

            ],
            [
                'postal_code' => '1080',
                'locality' => 'Molenbeek-Saint-Jean',
            ],
        ];

        DB::table('localities')->insert($locality);

    }
}
