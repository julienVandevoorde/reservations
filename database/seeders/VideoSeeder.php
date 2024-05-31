<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\Show;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
        {
            // Example data for seeding
            $videos = [
                [
                    'title' => 'Musique Lafouine',
                    'video_url' => 'https://www.youtube.com/embed/P7bPWKdrfJs',
                    'show_id' => 1, 
                ],
                [
                    'title' => 'Advanced Eloquent Techniques',
                    'video_url' => 'https://www.youtube.com/watch?v=-WI39YPwPgU',
                    'show_id' => 1, 
                ],
                [
                    'title' => 'Building REST APIs',
                    'video_url' => 'https://www.youtube.com/watch?v=VrISsL3uVu4',
                    'show_id' => 2, 
                ],
            ];
    
            DB::table('videos')->insert($videos);
        }
    }