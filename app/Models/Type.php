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
}
