<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'designation',
        'address',
        'locality_id',
        'website',
        'phone',
    ];

    public $table = 'locations';

    public $timestamp = false;

    public function shows(){
        return $this->hasMany(Show::class);
    }
    
    public function locality(){
        return $this->belongsTo(Locality::class);
    }
    
}
