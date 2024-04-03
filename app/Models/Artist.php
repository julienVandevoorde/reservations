<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
    ];

    public $table = 'artists';

    public $timestamps = false;

    public function types(){
        return $this->belongsToMany(Type::class);
    }

    public function artistsTypes(){
        return $this->belongsToMany(ArtistType::class);
    }
}