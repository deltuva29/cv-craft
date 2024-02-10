<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * @param  Request  $request  <?string, mixed>
     * @param  Closure  $next  <?string, mixed>
     * @return Response<?string, mixed>
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            return $next($request);
        }

        $language = $request->user()->language;

        if (isset($language)) {
            app()->setLocale($language);
        }

        return $next($request);
    }
}
