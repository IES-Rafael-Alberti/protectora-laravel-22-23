<?php

namespace App\Http\Controllers\Mvc;
use App\Http\Controllers\Controller;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("mascotas", [ "mascotas" => Mascota::All() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("nuevamascota");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datos = [ "nombre" => $request->input('nombre'),
                    "fecha_nacimiento" => $request->input('fecha_nacimiento')];

                    
        // TODO: explicar forma de llegada de los datos
        Mascota::create($request->all());
        return redirect()->route('mascotas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        //
        return view("mascota", [ "mascota" => $mascota ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        //
        return view('nuevamascota', ["mascota" => $mascota]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascota $mascota)
    {
        //
        $mascota->fill($request->all())->saveOrFail();
        return redirect()->route('mascotas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        //
        $mascota->deleteOrFail();
        return redirect()->route('mascotas.index');
    }
}
