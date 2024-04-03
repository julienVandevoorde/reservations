<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'when',
        'location_id',
    ];

    public $table = 'representations';

    public $timestamp = false;

    public function shows(){
        return $this->belongsToMany(Show::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}