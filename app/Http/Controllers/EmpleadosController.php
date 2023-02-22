<?php

namespace App\Http\Controllers;


use App\Models\Empleado;
use App\Http\Requests\EmpleadosRequest;
use Illuminate\Http\Request;
use Exception;

class EmpleadosController extends Controller
{

    //mostrar todos los empleados
    public function index()
    {
        try {
            $usuarios = Empleado::get();

            return response()->json($usuarios);
        } catch (Exception $e) {
            return response()->json(['error por furro' => $e->getMessage()], 400);
        }
    }

    //agregar nuevo empleado
    public function store(EmpleadosRequest $request)
    {
        try {
            $data = $request->all();

            $usuario = Empleado::create($data);

            return response()->json($usuario);
        } catch (Exception $f) {
            return response()->json(['error por friki' => $f->getMessage()], 400);
        }
    }

    //Buscar Empleado por ID
    public function show(Request $request)
    {
        try {
            $user = Empleado::find($request->id);
            return response()->json($user);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }

    //borrar Empleado
    public function destroy(Request $r)
    {
        try {
            $user = Empleado::find($r->id);
            $user->delete();
            return response()->json(['Estado:' => 'eliminado']);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }

    //modificar modulo de empleado mediante ID 
    //requiere ID obligatorio, solo actualizara lo que agregues al request
    public function updateEmpleado(Request $r)
    {
        try {
            $user = Empleado::find($r->id);
            /*$user->modulo = $r->modulo;*/

            if ($r->nombre != '') {
                $user->nombre = $r->nombre;
            }
            if ($r->apellidos != '') {
                $user->apellidos = $r->apellidos;
            }
            if ($r->correo != '') {
                $user->correo = $r->correo;
            }
            if ($r->telefono != '') {
                $user->telefono = $r->telefono;
            }
            if ($r->direccion != '') {
                $user->direccion = $r->direccion;
            }

            if ($r->id_modulo != null) {
                $user->id_modulo = $r->id_modulo;
            }

            $user->save();
            return response()->json(['Estado:' => 'Modificado']);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }
}