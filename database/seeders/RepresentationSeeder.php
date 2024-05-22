<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Representation;

class RepresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Representation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        // Define data
        $representations = [
            [
                'location_id' => '1',
                'show_id' => '1',
                'when' => '2012-10-12 13:30',
            ],
            [
                'location_id' => '2',
                'show_id' => '1',
                'when' => '2012-10-12 20:30',
            ],
            [
                'location_id' => '3',
                'show_id' => '4',
                'when' => '2012-10-02 20:30',
            ],
            [
                'location_id' => '2',
                'show_id' => '1',
                'when' => '2012-10-16 20:30',
            ],
        ];

        // Insert data into the table
        foreach ($representations as $data) {
            DB::table('representations')->insert([
                'location_id' => $data['location_id'],
                'show_id' => $data['show_id'],
                'when' => $data['when'],
            ]);
        }
    }
}
