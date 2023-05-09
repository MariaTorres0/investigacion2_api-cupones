<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CuponController extends Controller
{

    public function getCuponById($id)
    {

        $cupon = Cupon::where('id_cupon', '=', $id)->get();
        return response()->json([
            'status' => 200,
            'body' => $cupon
        ], 200);
    }

    public function updateCupon($id)
    {

        $cupon = Cupon::where('id_cupon', '=', $id)->get();

        if ($cupon->isNotEmpty()) {
            if ($cupon[0]->vencido != 0) {
                return response()->json([
                    'status' => 400,
                    'msj' => 'Cupon vencido',
                    'body' => null,

                ], 400);
            } else if ($cupon[0]->estado == 1) {
                return response()->json([
                    'status' => 400,
                    'msj' => 'Cupon ya canjeado',
                    'body' => null,

                ], 400);
            } else {
                $cuponUpd = Cupon::where('id_cupon', $id)->update(['estado' => 1]);
                $cupon = Cupon::where('id_cupon', '=', $id)->get();
                return response()->json([
                    'status' => 200,
                    'msj' => 'Actualizado',
                    'body' => $cupon,
                ], 200);
            }

        } else {
            return response()->json([
                'status' => 404,
                'msj' => 'cupon no encontrado',
                'body' => $cupon
            ], 404);
        }

    }
}
