<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuariosRequest;

use App\Models\Usuarios;
use Exception;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    //mostrar todos los usuarios inscritos
    public function index()
    {
        try {
            $usuarios = Usuarios::get();

            return response()->json($usuarios);
        } catch (Exception $e) {
            return response()->json(['error por furro' => $e->getMessage()], 400);
        }
    }

    //Agregar Nuevo Usuario
    public function store(UsuariosRequest $request)
    {
        try {
            $data = $request->all();

            $usuario = Usuarios::create($data);

            return response()->json($usuario);
        } catch (Exception $f) {
            return response()->json(['error por friki' => $f->getMessage()], 400);
        }
    }

    //mostrar usuario deacuerdo a su ID
    public function show(request $id)
    {
        try {
            $user = Usuarios::where('id', $id->id)->get();
            return response()->json($user);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }

    //modificar datos del usuario (No es modificable completamente)
    //solo modificara los datos que se envien al request
    public function update(Request $request)
    {
        try {
            $user = Usuarios::find($request->id);

            if ($request->correo != '') {
                $user->correo = $request->correo;
            }
            if ($request->telefono != '') {
                $user->telefono = $request->telefono;
            }
            if ($request->direccion != '') {
                $user->direccion = $request->direccion;
            }



            $user->save();
            return response()->json(['Estado:' => 'Modificado']);
        } catch (Exception $th) {
            return response()->json(['error por emo' => $th->getMessage()], 400);
        }
    }
}