<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Producto;

class ProductoTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;


    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_productos()
    {
        $producto = new Producto();
        $producto->nombre = "TestTitulo";
        $producto->descripcion = "TestDescripcion";
        $producto->save();

        $response = $this->getJson('api/productos');
        $response->assertStatus(200);

        $response->assertJsonFragment([
            'id' => $producto->id,
            'nombre' => 'Nombre: ' .$producto->nombre,
            'descripcion' => 'Descripcion: ' .$producto->descripcion,
            'Inventado' => 'Inventado: ',
            'categorias' => $producto->categorias->pluck('nombre')
        ]);
    }

    // function para hacer test de un update de productos
    public function test_update_productos()
    {
        $producto = new Producto();
        $producto->nombre = "TestTitulo";
        $producto->descripcion = "TestDescripcion";
        $producto->save();

        $response = $this->putJson('api/productos/'.$producto->id, [
            'nombre' => 'Nombre: ' .$producto->nombre,
            'descripcion' => 'Descripcion: ' .$producto->descripcion,
            'Inventado' => 'Inventado: ',
            'categorias' => $producto->categorias->pluck('nombre')
        ]);
        $response->assertStatus(200);
    }
}
