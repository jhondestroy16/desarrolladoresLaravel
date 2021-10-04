<?php

namespace App\Http\Controllers;

use App\Models\Desarrollador;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class DesarrolladorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query = $request->buscar;
            $desarrolladores = Desarrollador::where('nombre','LIKE','%'.$query.'%')
                                            ->orderBy('nombre','asc')
                                            ->get();
            return view('desarrolladores.index', compact('desarrolladores', 'query'));
        }
        //listar los desarrolladores ordenados por nombre ascendentemente
        $desarrolladores = Desarrollador::orderBy('nombre','asc')->get();
        //Enviar a la vista
        return view('desarrolladores.index', compact('desarrolladores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //listar proyectos
        $proyectos = Proyecto::orderBy('nombre','asc')->get();
        //Enviar a la vista
        return view('desarrolladores.insert', compact('proyectos'));
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
        $request->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'direccion'=> 'required',
            'telefono'=> 'required',
            'proyectoId'=> 'required'
        ]);

        Desarrollador::create($request->all());

        return redirect()->route('desarrolladores.index')->with('exito','Se ha agregado el desarrollador exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $desarrollador = Desarrollador::join('proyectos', 'desarrolladores.proyectoId','=','proyectos.id')
                                        ->select('desarrolladores.*','proyectos.nombre as nombreProyecto','proyectos.duracion')
                                        ->where('desarrolladores.id','=',$id)
                                        ->first();
        return view('desarrolladores.view', compact('desarrollador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desarrollador $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proyectos = Proyecto::orderBy('nombre','asc')->get();
        $desarrollador = Desarrollador::FindOrFail($id);
        return view('desarrolladores.edit', compact('proyectos','desarrollador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'direccion'=> 'required',
            'telefono'=> 'required',
            'proyectoId'=> 'required'
        ]);

        $desarrollador = Desarrollador::findOrFail($id);
        $desarrollador->update($request->all());
        return redirect()->route('desarrolladores.index')->with('exito','Se ha modificado los datos del desarrollador exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $desarrollador = Desarrollador::findOrFail($id);
        $desarrollador->delete();

        return redirect()->route('desarrolladores.index')->with('exito','Se ha eliminado el desarrollador correctamente.');
    }
}
