<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localities extends Model
{
    use HasFactory;

    protected $fillable = [
        'postal_code',
        'locality',
    ];

    protected $timestamp = false;
}
