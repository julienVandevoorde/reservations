<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    protected $fillable = [
        'postal_code',
        'locality',
    ];

    public $table = 'localities';

    public $timestamp = false;

    public function location(){
        return $this->hasMany(Location::class);
    }
}
