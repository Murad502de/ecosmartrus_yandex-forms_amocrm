<?php

namespace App\Http\Middleware\API\V1;

use App\Traits\ServicesAmocrmTokenTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServicesAmocrmTokenMiddleware__1
{
    use ServicesAmocrmTokenTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (self::checkAmocrmToken()) {
            return $next($request);
        }
    }
}
