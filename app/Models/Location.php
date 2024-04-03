<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'address',
        'locality_id',
        'website',
        'phone',
    ];

    protected $table = 'locations';

    public $timestamp = false;
}
