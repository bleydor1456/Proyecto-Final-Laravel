<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitasRequest;
use App\Models\Cita;
use Illuminate\Http\Request;
use Exception;

class CitaController extends Controller
{
    
    //Select * from de la tabla
    public function index(){
        try{
            return response()->json(Cita::get());
        } catch (Exception  $e) {
            return response()->json(['error por furro' => $e->getMessage()], 400);
        }
    }

    //agregar nueva cita
    public function store(CitasRequest $request){
        try{
            $u = Cita::create($request->all());

            return response()->json($u);
        } catch (Exception $f){
            return response()->json(['error por friki' => $f->getMessage()], 400);
        }
    }

    //mostrar citas por cada modulo
    public function showModulo(Request $r){
        try {
            $u = Cita::where('id_modulo_cita', $r->id)->get();
            return response()->json($u);

        } catch (Exception $th) {
            return response()->json(['error por kpoper' => $th->getMessage()], 400);
        }
    }


    //mostrar citas por usuario (podemos ver cuales estan en proceso y cuales estan finalizadas)
    public function showUsuario(Request $r){
        try {
            $u = Cita::where('id_usuario_cita', $r->id)->get();
            return response()->json($u);

        } catch (Exception $th) {
            return response()->json(['error por jodido' => $th->getMessage()], 400);
        }
    }

    //mostrar cita por vehiculo (podemos ver el estado de la cita buscando por vehiculo)
    public function showVehiculo(Request $r){
        try {
            $u = Cita::where('id_vehiculo_citado', $r->id)->get();
            return response()->json($u);

        } catch (Exception $th) {
            return response()->json(['error por gordofobico(Soy Gordofobico)' => $th->getMessage()], 400);
        }
    }

    //mostrar citas por estado, (podemos buscar cuales ya estan legalizados y cuales estan en proceso)
    public function showEstado(Request $r){
        try {
            $u = Cita::where('estado', $r->estado)->get();
            return response()->json($u);

        } catch (Exception $th) {
            return response()->json(['error por ...' => $th->getMessage()], 400);
        }
    }

    //actualizar el estado de la cita (solo actualiza lo que contenga el request)
    public function update(Request $r)
    {
        try {
            $u = Cita::find($r->id);
            //$u->estado = $request->estado;
            if($r->fecha_cita != ''){
                $u->fecha_cita = $r->fecha_cita;
            }
            if($r->id_modulo_cita != null){
                $u->id_modulo_cita = $r->id_modulo_cita;
            }
            if($r->estado != ''){
                $u->estado = $r->estado;
            }
            $u->save();
            return response()->json(['Estado:' => 'Modificado']);
        } catch (Exception $th) {
            return response()->json(['error por ' => $th->getMessage()], 400);
        }
    }

}
