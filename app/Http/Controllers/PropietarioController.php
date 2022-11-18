<?php

namespace App\Http\Controllers;
use App\Models\Propietario;

use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    //
    public function listado() {
        return view('propietarios', [ "propietarios" => Propietario::all() ]);
    }

    public function detalle(Request $request, $id) {         
        return view('propietario', [ "propietario" => Propietario::find($id) ]);
    }
}
