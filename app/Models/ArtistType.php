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

    protected $table = 'artist_type';

    public $timestamps = false;

    public function artist(){
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function type(){
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function shows(){
        return $this->belongsToMany(Show::class, 'artist_type_show', 'artist_type_id', 'show_id');
    }

}
