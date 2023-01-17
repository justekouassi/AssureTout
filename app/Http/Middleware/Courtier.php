<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Courtier
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		if (auth()->user()->role == 'Courtier') {
			return $next($request);
		} else {
			abort(403, "Vous n'êtes pas autorisé à visiter cette page car vous n'êtes pas du service courrier !");
		}
	}
}
