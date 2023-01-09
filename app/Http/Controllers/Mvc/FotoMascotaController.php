<?php

namespace App\Http\Controllers\Mvc;
use App\Http\Controllers\Controller;

use App\Models\Foto_Mascota;
use App\Models\Mascota;
use Illuminate\Http\Request;

class FotoMascotaController extends Controller
{
    public function crear(Request $request, Mascota $mascota)
    {
        //
        $urlfoto = $request->file('foto')->store('mascotas', 'public');
        $foto = new Foto_Mascota;
        $foto->mascota_id = $mascota->id;
        $foto->rutafoto = "/storage/" . $urlfoto;
        $foto->save();
        return redirect()->route("mascotas.show", ["mascota" => $mascota->id]);
    }

    public function borrar(Foto_Mascota $fotomascota)
    {
        xdebug_break();
        $fotomascota->deleteOrFail();
        return redirect()->route("mascotas.show", ["mascota" => $fotomascota->mascota_id]);
    }
}
