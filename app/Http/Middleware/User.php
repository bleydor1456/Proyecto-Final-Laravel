<?php

namespace App\Http\Middleware;

use App\Models\Usuarios;
use Closure;
use Illuminate\Http\Request;

class User
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
        try {
            $a = Usuarios::find($request->id)->exists();
            if($a != True){
                return response()->json(['error' => 'No se encontraron datos del usuario']);
            } else {
                return $next($request);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Error del sistema']);
        }
    }
}