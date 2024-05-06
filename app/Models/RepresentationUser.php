<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentationUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'places',
    ];

    protected $table = 'representation_user';

    public $timestamps = false;

    public function representation(){
        return $this->belongsTo(Representation::class, 'representation_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
