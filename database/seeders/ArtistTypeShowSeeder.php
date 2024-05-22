<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Artist;
use App\Models\Type;
use App\Models\ArtistType;
use App\Models\Show;
use Illuminate\Support\Facades\Log;


class ArtistTypeShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('artist_type_show')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        //Define data
        $artistTypeShows = [
            [
                'artist_type_id'=>5,
                'show_id'=>2,
            ],
            [
                'artist_type_id'=>1,
                'show_id'=>1,
            ],
            [
                'artist_type_id'=>4,
                'show_id'=>1,
            ],
            [
                'artist_type_id'=>7,
                'show_id'=>1,
            ],
            [
                'artist_type_id'=>1,
                'show_id'=>4,
            ],
            [
                'artist_type_id'=>2,
                'show_id'=>2,
            ],
        ];
        
        DB::table('artist_type_show')->insert($artistTypeShows);
    }
}
