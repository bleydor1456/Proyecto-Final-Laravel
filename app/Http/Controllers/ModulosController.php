<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModulosRequest;
use App\Models\Modulo;
use Exception;
use Illuminate\Http\Request;

class ModulosController extends Controller
{

    //agregar nuevo modulo
    public function store(ModulosRequest $request)
    {
        try {
            $u = Modulo::create($request->all());

            return response()->json($u);
        } catch (Exception $f) {
            return response()->json(['error por friki' => $f->getMessage()], 400);
        }
    }

    public function index(ModulosRequest $request)
    {
        try {
            $usuarios = Modulo::get();

            return response()->json($usuarios);
        } catch (Exception $e) {
            return response()->json(['error por furro' => $e->getMessage()], 400);
        }
    }


    public function show(ModulosRequest $request)
    {
        try {
            $vehiculo = Modulo::find($id);
            return response()->json($user);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }

    public function update(Request $r)
    {
        try {
            $user = Modulo::find($r->id);
            //$user->estado = $r->estado;

            if ($r->estado != '') {
                $user->estado = $r->estado;
            }
            if ($r->telefono != '') {
                $user->telefono = $r->telefono;
            }
            if ($r->capacidad != null) {
                $user->capacidad = $r->capacidad;
            }

            $user->save();
            return response()->json(['Estado:' => 'Modificado']);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }
}