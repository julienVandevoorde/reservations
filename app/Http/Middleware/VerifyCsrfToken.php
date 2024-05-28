<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Les URI qui devraient être exclus de la vérification CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/show/*',        
    ];
}
