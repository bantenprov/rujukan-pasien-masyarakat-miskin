<?php namespace Bantenprov\RujukanPasienMiskin\Http\Middleware;

use Closure;

/**
 * The RujukanPasienMiskinMiddleware class.
 *
 * @package Bantenprov\RujukanPasienMiskin
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RujukanPasienMiskinMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
