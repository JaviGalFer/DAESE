<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtiquetaRequest;
use App\Http\Resources\EtiquetaResource;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etiquetas = Etiqueta::all();

        return EtiquetaResource::collection($etiquetas); // 200 es para que todo ha ido bien
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
    public function store(EtiquetaRequest $request)
    {
        $etiqueta = new Etiqueta();
        $etiqueta->nombre = $request->nombre;
        $etiqueta->save();

        return new etiquetaResource($etiqueta); // 200 es para que todo ha ido bien
    }

    /**
     * Display the specified resource.
     */
    public function show($id):JsonResource
    {
        $etiqueta = Etiqueta::find($id);
        return new EtiquetaResource($etiqueta); // 200 es para que todo ha ido bien
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etiqueta $etiqueta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id):JsonResource
    {
        $etiqueta = Etiqueta::find($id);
        $etiqueta->nombre = $request->nombre;

        $etiqueta->save();

        return new EtiquetaResource($etiqueta); // 200 es para que todo ha ido bien
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->delete();
        return response()->json(['success' => true], 200); // 200 Para que devuelva OK
    }
}
