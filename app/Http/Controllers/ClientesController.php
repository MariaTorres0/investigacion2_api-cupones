<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function getClienteById($id)
    {
        $cliente = Cliente::where('id_cli', '=', $id)->get();
        if ($cliente->isNotEmpty()) {
            return response()->json([
                'status' => 200,
                'msj' => 'cliente encontrado',
                'body' => $cliente
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'cliente no encontrado',
                'body' => null
            ], 404);
        }
    }
    public function getClienteByIdPer($id)
    {
        $cliente = Cliente::where('id_cli', '=', $id)->get();

        if ($cliente->isNotEmpty()) {
            $datosAEnviar = [
                'nombre' => $cliente[0]['nombre'],
                'apellido' => $cliente[0]['apellido'],
                'dui' => $cliente[0]['dui'],
            ];
            return response()->json([
                'status' => 200,
                'msj' => 'cliente encontrado',
                'body' => $datosAEnviar
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'cliente no encontrado',
                'body' => null
            ], 404);
        }
    }

    public function getClientes()
    {
        $clientes = Cliente::all();

        if ($clientes->isNotEmpty()) {
            return response()->json([
                'status' => 200,
                'msj' => 'clientes encontrados',
                'body' => $clientes
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'cliente no encontrado',
                'body' => null
            ], 404);
        }
    }

    public function saveCliente(Request $request)
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

        $cliente = Cliente::create([
            "id_tipo_u" => $request->id_tipo_u,
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            "telefono" => $request->telefono,
            "direccion" => $request->direccion,
            "dui" => $request->dui,
            "correo" => $request->correo,
            "contrasena" => $request->contrasena,
            "hash_verificar" => $request->hash_verificar,
            "activada" => $request->activada
        ]);

        return response()->json([
            'status' => 404,
            'msj' => 'cliente creado correctamente',
            'body' => $cliente
        ], 201);
    }

    public function deleteById($id){
        $cliente = Cliente::where('id_cli', '=', $id)->get();
        if ($cliente->isNotEmpty()) {
            Cliente::where('id_cli', '=', $id)->delete();
            return response()->json([
                'status' => 200,
                'msj' => 'cliente eliminado',
                'body' => null
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'cliente no encontrado',
                'body' => null
            ], 404);
        }
    }

    public function updateById(Request $request){
        $cliente = Cliente::where('id_cli', '=', $request->id_cli)->get();

        if ($cliente->isNotEmpty()) {
            $clienteUpd = Cliente::where('id_cli', '=', $request->id_cli)->update([
                "id_tipo_u" => $request->id_tipo_u,
                "nombre" => $request->nombre,
                "apellido" => $request->apellido,
                "telefono" => $request->telefono,
                "direccion" => $request->direccion,
                "dui" => $request->dui,
                "correo" => $request->correo,
                "contrasena" => $request->contrasena,
                "hash_verificar" => $request->hash_verificar,
                "activada" => $request->activada
            ]);

            return response()->json([
                'status' => 200,
                'msj' => 'cliente actualizado',
                'body' => $clienteUpd
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'cliente no encontrado',
                'body' => null
            ], 404);
        }
    }
}
