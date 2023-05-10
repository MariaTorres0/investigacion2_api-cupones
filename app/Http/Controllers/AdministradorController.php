<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{

    public function getAdministradorById($id)
    {
        $Administrador = Administrador::where('id_admin', '=', $id)->get();
        if ($Administrador->isNotEmpty()) {
            return response()->json([
                'status' => 200,
                'msj' => 'Administrador encontrado',
                'body' => $Administrador
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'Administrador no encontrado',
                'body' => null
            ], 404);
        }
    }

    public function getAdministradores()
    {
        $Administradors = Administrador::all();

        if ($Administradors->isNotEmpty()) {
            return response()->json([
                'status' => 200,
                'msj' => 'Administradores encontrados',
                'body' => $Administradors
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'Administradores no encontrados',
                'body' => null
            ], 404);
        }
    }

    public function saveAdministrador(Request $request)
    {
        /*$validatedData = $request->validate([
            'id_tipo_u' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required|min:10',
            'dui' => 'required|min:9',
            'correo' => 'required|email|min:10',
            'contrasena' => 'required',
            'hash_verificar' => 'required',
            'activada' => 'required'
        ]);*/

        $Administrador = Administrador::create([
            "id_tipo_u" => $request->id_tipo_u,
            "correo" => $request->correo,
            "contrasena" => $request->contrasena,
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
        ]);

        return response()->json([
            'status' => 404,
            'msj' => 'Administrador creado correctamente',
            'body' => $Administrador
        ], 200);
    }

    public function deleteAdministradorById($id){
        $Administrador = Administrador::where('id_admin', '=', $id)->get();
        if ($Administrador->isNotEmpty()) {
            Administrador::where('id_admin', '=', $id)->delete();
            return response()->json([
                'status' => 200,
                'msj' => 'Administrador eliminado',
                'body' => null
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'Administrador no encontrado',
                'body' => null
            ], 404);
        }
    }

    public function updateAdministradorById(Request $request){
        $Administrador = Administrador::where('id_admin', '=', $request->id_admin)->get();

        if ($Administrador->isNotEmpty()) {
            $AdministradorUpd = Administrador::where('id_admin', '=', $request->id_admin)->update([
                "id_tipo_u" => $request->id_tipo_u,
                "correo" => $request->correo,
                "contrasena" => $request->contrasena,
                "nombre" => $request->nombre,
                "apellido" => $request->apellido,
            ]);

            return response()->json([
                'status' => 200,
                'msj' => 'Administrador actualizado',
                'body' => $AdministradorUpd
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'Administrador no encontrado',
                'body' => null
            ], 404);
        }
    }
}
