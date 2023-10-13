<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Maintenance
{
    public function handle(Request $request, Closure $next)
    {
        if(settings()->site_status == 'مغلق')
        {
            return redirect()->route('site.maintenance');
        }

        return $next($request);
    }
}
