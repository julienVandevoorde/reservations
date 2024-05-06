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

    protected $table = 'representations';

    public $timestamps = false;

    public function show(){
        return $this->belongsTo(Show::class, 'show_id');
    }

    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'representation_user', 'representation_id', 'user_id');
    }
}