<?php

namespace App\Http\Controllers;


use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function getEmpleadoById($id)
    {
        $empleado = Empleado::where('id_em', '=', $id)->get();
        if ($empleado->isNotEmpty()) {
            return response()->json([
                'status' => 200,
                'msj' => 'Empleado encontrado',
                'body' => $empleado
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'Empleado no encontrado',
                'body' => null
            ], 404);
        }
    }

    public function getEmpleados()
    {
        $empleados = Empleado::all();

        if ($empleados->isNotEmpty()) {
            return response()->json([
                'status' => 200,
                'msj' => 'Empleados encontrados',
                'body' => $empleados
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'Empleado no encontrado',
                'body' => null
            ], 404);
        }
    }

    public function saveEmpleado(Request $request)
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

        $empleado = Empleado::create([
            "id_tipo_u" => $request->id_tipo_u,
            "codigo_empresa" => $request->codigo_empresa,
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            "correo" => $request->correo,
            "contrasena" => $request->contrasena,
        ]);

        return response()->json([
            'status' => 404,
            'msj' => 'Empleado creado correctamente',
            'body' => $empleado
        ], 200);
    }

    public function deleteEmpleadoById($id){
        $empleado = Empleado::where('id_em', '=', $id)->get();
        if ($empleado->isNotEmpty()) {
            Empleado::where('id_em', '=', $id)->delete();
            return response()->json([
                'status' => 200,
                'msj' => 'Empleado eliminado',
                'body' => null
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'Empleado no encontrado',
                'body' => null
            ], 404);
        }
    }

    public function updateEmpleadoById(Request $request){
        $empleado = Empleado::where('id_em', '=', $request->id_em)->get();

        if ($empleado->isNotEmpty()) {
            $empleadoUpd = Empleado::where('id_em', '=', $request->id_em)->update([
                "id_tipo_u" => $request->id_tipo_u,
                "codigo_empresa" => $request->codigo_empresa,
                "nombre" => $request->nombre,
                "apellido" => $request->apellido,
                "correo" => $request->correo,
                "contrasena" => $request->contrasena,
            ]);

            return response()->json([
                'status' => 200,
                'msj' => 'Empleado actualizado',
                'body' => $empleadoUpd
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'Empleado no encontrado',
                'body' => null
            ], 404);
        }
    }
}
