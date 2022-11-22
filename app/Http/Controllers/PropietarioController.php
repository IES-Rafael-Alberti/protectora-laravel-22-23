<?php

namespace App\Http\Controllers;
use App\Models\Propietario;

use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("propietarios", [ "propietarios" => Propietario::All() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("nuevopropietario");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Para que funcione es importante que el nombre de los 'input'
        // del formulario coincida con el nombre de los atributos de la entidad   
        // TODO: explicar forma de llegada de los datos
        $urlfoto = $request->file('foto')->store('propietarios', 'public');
        $datos = $request->all();
        $datos["rutafoto"] = "/storage/" . $urlfoto;
        Propietario::create($datos);
        return redirect()->route('propietarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        //
        return view("propietario", [ "propietario" => $propietario ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit(Propietario $propietario)
    {
        //
        return view('nuevopropietario', ["propietario" => $propietario]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propietario $propietario)
    {
        //
        xdebug_break();
        $datos = $request->all();
        if(!is_null($request->file('foto'))) {
            $urlfoto = $request->file('foto')->store('propietarios', 'public');
            $datos["rutafoto"] = "/storage/" . $urlfoto;
        }
        $propietario->fill($datos)->saveOrFail();
        return redirect()->route('propietarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propietario $propietario)
    {
        //
        $propietario->deleteOrFail();
        return redirect()->route('propietarios.index');
    }
}
