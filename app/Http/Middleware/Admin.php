<?php

namespace App\Http\Middleware;

use App\Models\Empleado;
use Closure;
use Exception;
use Illuminate\Http\Request;

class Admin
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
            // se requiere ser de administradores o de Recepcion para poder operar la base de datos
            $admin = Empleado::find($request->id);
            if ($admin->puesto_trabajo == "Administrador" || $admin->puesto_trabajo == "Recepcion") {
                return $next($request);
            } else {
                return response()->json(['estado' => 'Empleado sin autorizacion']);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'No se encontraron datos del Administrador']);
        }



        //return $next($request);
    }
}