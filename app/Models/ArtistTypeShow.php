<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistTypeShow extends Model
{
    use HasFactory;

    public $table = 'artist_type_show';

    public $timestamp = false;
}