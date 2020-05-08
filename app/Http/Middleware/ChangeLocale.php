<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLocale
{
    public function handle($request, Closure $next)
    {
        $language = $request->header('accept-language');

        if ($language) {
            $language = explode(',', $language)[0];
            \App::setLocale($language);
        }

        return $next($request);
    }}
