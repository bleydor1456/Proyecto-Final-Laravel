<?php

namespace App\Http\Middleware;

use App\Models\Empleado;
use Closure;
use Illuminate\Http\Request;

class Recepcion
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
            $recep = Empleado::find($request->empleado);
            if ($recep->puesto_trabajo ==  "Auxiliar") {
                return $next($request);

            } else {
                return response()->json(['estado' => 'Usuario no autorizado']);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'No se encontraron datos del Empleado']);
        }



    }
}