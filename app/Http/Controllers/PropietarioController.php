<?php

namespace App\Http\Controllers;
use App\Models\Propietario;

use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    //
    public function listado() {
        return view('propietarios', [ "listado" => Propietario::all() ]);
    }
}
