<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        //
        // Vamos a tener en l avariable todo de la tabla Protucto
        $productos = Producto::all();
        // Vamos a devolver un json con los productos
        // y el 200 es para controlar que todo ha ido bien
        // return response()->json($productos,200);
        return ProductoResource::collection($productos); // 200 es para que todo ha ido bien
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
    public function store(ProductoRequest $request)
    {
        //Opcióon 1 
        /*

        $categorias = $request->categorias;
        $params = $request->all();
        unset($params['categorias']); // Eliminar categorias de $params
        $producto=Producto::create($params);
        $producto->categorias()->attach($categorias); // Asociar categorias al producto (relacion muchos a muchos)
        // $producto = Producto::create($request->all());
        return response()->json($producto, 201); // 200 es para que todo ha ido bien

        */
        // Opción 2

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->save();

        $producto->categorias()->attach($request->categorias); // Asociar categorias al producto (relacion muchos a muchos) 

        return new ProductoResource($producto); // 200 es para que todo ha ido bien
    }

    /**
     * Display the specified resource.
     */
    public function show($id):JsonResource
    {
        //
        $producto = Producto::find($id);
        // return response()->json($producto, 200); // 200 es para que todo ha ido bien
        return new ProductoResource($producto); // 200 es para que todo ha ido bien
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Producto $producto)
    // {
    //     //
    //     // $producto->update($request->all());
    //     return response()->json($producto, 200); // 200 es para que todo ha ido bien
    // }

    public function update(Request $request, $id):JsonResource
    {
        //
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        // $producto->categorias() = null;
        // $producto->save();
        $producto->categorias()->attach($request->categorias);
        $producto->save();

        return new ProductoResource($producto); // 200 es para que todo ha ido bienx
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();
        return response()->json(null, 204); // 204 es para que todo ha ido bien
    }
}
