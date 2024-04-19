<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            ArtistSeeder::class,
            TypeSeeder::class,
            LocalitySeeder::class,
            RoleSeeder::class,           
            LocationSeeder::class,    
            ShowSeeder::class,
        ]);
        
    }
}

