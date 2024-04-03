<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    use HasFactory;

    protected $fillable = [
        'when',
    ];

    protected $table = 'representations';

    public $timestamp = false;
}
