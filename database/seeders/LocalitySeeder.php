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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Locality::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $locality = [
            [
                'postal_code' => '1000',
                'locality' => 'Bruxelles-Capitale',
            ],
            [
                'postal_code' => '1170',
                'locality' => '1170',

            ],
        ];

        DB::table('localities')->insert($locality);

    }
}
