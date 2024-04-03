<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistType extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'type_id',
    ];

    public $table = 'artist_type';

    public $timestamp = false;

    public function artists(){
        return $this->belongsTo(Artist::class);
    }

    public function types(){
        return $this->belongsTo(Type::class);
    }

    public function shows(){
        return $this->belongsToMany(Show::class);
    }

}
