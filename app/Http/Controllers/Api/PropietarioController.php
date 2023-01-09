<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

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
        // API
        return Propietario::paginate(5);
        // MVC
        //return view("propietarios", [ "propietarios" => Propietario::paginate(5) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $propietario = Propietario::create($datos);
        return $propietario;
        // MVC
        // return redirect()->route('propietarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        return $propietario;
        // MVC
        // return view("propietario", [ "propietario" => $propietario ]);

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
        $datos = $request->all();
        if(!is_null($request->file('foto'))) {
            $urlfoto = $request->file('foto')->store('propietarios', 'public');
            $datos["rutafoto"] = "/storage/" . $urlfoto;
        }
        $propietario->fill($datos)->saveOrFail();
        return [
            "status" => 1,
            "data" => $propietario,
            "msg" => "Propetario modificado"
        ];
        // MVC
        // return redirect()->route('propietarios.index');
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
        return [
            "status" => 1,
            "data" => $propietario,
            "msg" => "Propetario borrado"
        ];
        // MVC
        // return redirect()->route('propietarios.index');
    }
}
