<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareaRequest;
use App\Http\Resources\TareaResource;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        $tareas = Tarea::all();

        return TareaResource::collection($tareas); // 200 es para que todo ha ido bien
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TareaRequest $request):JsonResource
    {
        $tarea = new Tarea();
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->save();

        $tarea->etiquetas()->attach($request->etiqueta); // Asociar etiquetas al tarea (relacion muchos a muchos)

        return new TareaResource($tarea); // 200 es para que todo ha ido bien
    }

    /**
     * Display the specified resource.
     */
    public function show($id):JsonResource
    {
        $tarea = Tarea::find($id);
        return new TareaResource($tarea); // 200 es para que todo ha ido bien
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id):JsonResource
    {
        $tarea = Tarea::find($id);
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->etiquetas()->detach(); // Eliminar categorias del tarea (relacion muchos a muchos)
        
        $tarea->etiquetas()->attach($request->etiquetas);
        $tarea->save();

        return new TareaResource($tarea); // 200 es para que todo ha ido bienx
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return response()->json(['success' => true], 200); // 200 Para que devuelva OK
    }
}
