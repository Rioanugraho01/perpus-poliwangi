<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckButtonStatus
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
        if ($request->session()->has('buttonClicked')) {
            return redirect()->route('home'); // Ubah 'home' dengan nama rute halaman utama Anda
        }
        return $next($request);
    }
}
