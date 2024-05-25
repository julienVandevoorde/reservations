<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    protected $table = 'types';

    public $timestamps = false;


    public function artists(){
        return $this->belongsToMany(Artist::class, 'artist_type', 'type_id', 'artist_id');
    }


    public function artistTypes(){
        return $this->belongsToMany(ArtistType::class, 'artist_type', 'type_id', 'type_id');
    }
    
}
