<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'poster_url',
        'location_id',
        'bookable',
        'price',
    ];

    public $table = 'shows';

    public $timestamp = true;

    public function artistsTypes(){
        return $this->belongsToMany(ArtistType::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function representations(){  
        return $this->hasMany(Representation::class);   
    }

}