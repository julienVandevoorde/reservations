<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentationUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'place',
    ];

    public $table = 'representation_user';

    public $timestamp = false;
}
