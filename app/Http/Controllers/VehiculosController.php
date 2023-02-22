<?php

namespace App\Http\Controllers;


use App\Http\Requests\VehiculosRequest;
use App\Models\Vehiculo;
use Exception;

use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    //simulemos que el id del vehiculo corresponde al numero de matricula (nomas para no hacer las pruebas muy batallozas en postman)

    public function index()
    {
        try {
            $usuarios = Vehiculo::get();

            return response()->json($usuarios);
        } catch (Exception $e) {
            return response()->json(['error por furro' => $e->getMessage()], 400);
        }
    }

    public function store(VehiculosRequest $request)
    {
        try {
            $data = $request->all();

            $usuario = Vehiculo::create($data);

            return response()->json($usuario);
        } catch (Exception $f) {
            return response()->json(['error por friki' => $f->getMessage()], 400);
        }
    }

    public function show(Request $r)
    {
        try {
            $vehiculo = Vehiculo::find($r->id);
            return response()->json($vehiculo);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }

    public function show_dueño(Request $r)
    {
        try {
            $vehiculos = Vehiculo::where('id_dueño', $r->id)->get();
            return response()->json($vehiculos);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }

    public function destroy(Request $r)
    {
        try {
            $user = Vehiculo::find($r->id);
            $user->delete();
            return response()->json(['Estado:' => 'eliminado']);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }

    public function updateCambioPropietario(Request $r)
    {
        try {
            $u = Vehiculo::find($r->id);
            /*$user->modulo = $r->modulo;*/

            $u->id_dueño = $r->id_dueño;

            $u->save();
            return response()->json(['Estado:' => 'Cambio de propietario realizado']);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }

}