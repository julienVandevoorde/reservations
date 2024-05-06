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

    public $timestamps = false;

    public function shows(){
        return $this->hasMany(Show::class, 'location_id');
    }
    
    public function locality(){
        return $this->belongsTo(Locality::class, 'locality_id');
    }
    
}
