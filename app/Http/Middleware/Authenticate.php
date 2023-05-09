<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Authenticate extends Middleware
{
    public function __construct(Request $request)
    {
        return $request->expectsJson() ? null : redirect()->route('login');
    }
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
    */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
