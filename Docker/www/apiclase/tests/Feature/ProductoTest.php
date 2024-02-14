<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Producto;

class ProductoTest extends TestCase
{
    /**
     * A basic test example.
     */
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
            'id' => $this->id,
            'nombre' => 'Nombre: ' .$this->nombre,
            'descripcion' => 'Descripcion: ' .$this->descripcion,
            'Inventado' => 'Inventado: ',
            'categorias' => $this->categorias->pluck('nombre')
        ]);
    }
}
