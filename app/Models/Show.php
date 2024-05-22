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

    protected $table = 'shows';

    public $timestamps = true;

    public function artistTypes()
    {
        return $this->belongsToMany(ArtistType::class, 'artist_type_show', 'show_id', 'artist_type_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function representations()
    {
        return $this->hasMany(Representation::class, 'show_id');
    }
}
