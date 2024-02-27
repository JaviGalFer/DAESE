<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Etiqueta;
use App\Models\User;

class EtiquetasTest extends TestCase
{
    use RefreshDatabase;
    public function test_get_Etiquetas()
    {
        $user = User::factory()->create();

        $etiquetas = new Etiqueta();
        $etiquetas->nombre = "TestTitulo";
        $etiquetas->save();

    
        $response = $this->actingAs($user)->withSession(['banned' => false])->getJson('api/etiquetas');
        $response->assertStatus(200);

        $response->assertJsonFragment([
            'id' => $etiquetas->id,
            'nombre' => 'Nombre: ' .$etiquetas->nombre,
            'Inventado' => 'Inventado: ',
        ]);
    }
    
    public function test_update_tarea()
    {

        $user = User::factory()->create();

        // Crear una etiquetas para ser actualizada
        $etiquetas = new Etiqueta();
        $etiquetas->nombre = "TestTitulo";
        $etiquetas->save();

        // Datos de actualización
        $updatedData = [
            'nombre' => 'NuevoTitulo',
        ];

        // Enviar una solicitud de actualización a la API
        $response = $this->actingAs($user)->withSession(['banned' => false])->putJson("api/etiquetas/{$etiquetas->id}", $updatedData);
        $response->assertStatus(200);

        // Refrescar el modelo desde la base de datos
        $etiquetas->refresh();

        // Verificar que la etiquetas ha sido actualizada en la base de datos
        $this->assertEquals($updatedData['nombre'], $etiquetas->nombre);
    }
    public function test_delete_tarea()
    {   
        $user = User::factory()->create();

        // Crear una etiqueta para ser eliminada
        $etiquetas = new Etiqueta();
        $etiquetas->nombre = "TestTitulo";
        $etiquetas->save();

        // Enviar una solicitud de eliminación a la API
        $response = $this->actingAs($user)->withSession(['banned' => false])->deleteJson("api/etiquetas/{$etiquetas->id}");
        $response->assertStatus(200);

        // Verificar que la etiquetas ha sido eliminada de la base de datos
        $this->assertNull(Etiqueta::find($etiquetas->id));
    }

    public function test_insert_tarea()
    {
        $user = User::factory()->create();

        // Datos de la nueva etiquetas
        $newEtiquetaData = [
            'nombre' => 'NuevoTitulo',

        ];

        // Enviar una solicitud de inserción a la API
        $response = $this->actingAs($user)->withSession(['banned' => false])->postJson('api/etiquetas', $newEtiquetaData);
        $response->assertStatus(201); // Verificar que la etiqueta ha sido creada exitosamente

        // Verificar que la etiqueta ha sido insertada en la base de datos
        $this->assertDatabaseHas('etiquetas', [
            'nombre' => $newEtiquetaData['nombre'],
        ]);
    }
}
