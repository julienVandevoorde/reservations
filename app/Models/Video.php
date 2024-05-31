<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'video_url',
        'show_id',
    ];

    protected $table = 'videos';

    public $timestamps = false;

    public function show()
    {
        return $this->belongsTo(Show::class, 'show_id');
    }
}
