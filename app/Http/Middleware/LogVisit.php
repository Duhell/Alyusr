<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class LogVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');
        $key = 'visit_' . md5($ipAddress . $userAgent);

        if(!Cache::has($key)){
            Visit::create([
                'ip_address'=>$request->ip(),
                'user_agent'=>$request->header('User-Agent')
            ]);
            Cache::put($key, true, now()->addMinutes(10));
        }
        return $next($request);
    }
}
