<?php

namespace Tests\Feature;

use App\Models\Equip;
use App\Models\Jugadora;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JugadoraApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Crear un equipo por defecto para las jugadoras
        Equip::factory()->create();
    }

    public function test_api_jugadoras_index_public()
    {
        Jugadora::factory()->count(3)->create();

        $response = $this->getJson('/api/jugadores');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
    }

    public function test_api_jugadoras_show_public()
    {
        $jugadora = Jugadora::factory()->create();

        $response = $this->getJson("/api/jugadores/{$jugadora->id}");

        $response->assertStatus(200)
                 ->assertJsonPath('data.id', $jugadora->id);
    }

    public function test_api_jugadoras_store_protected()
    {
        $user = User::factory()->create(['role' => 'administrador']);
        $equip = Equip::first();

        $data = [
            'nom' => 'Nova Jugadora',
            'equip_id' => $equip->id,
            'posicio' => 'Davantera',
            'dorsal' => 9,
            'edat' => 20
        ];

        $response = $this->actingAs($user, 'sanctum')
                         ->postJson('/api/jugadores', $data);

        $response->assertStatus(201)
                 ->assertJsonPath('data.nom', 'Nova Jugadora');
        
        $this->assertDatabaseHas('jugadoras', ['nom' => 'Nova Jugadora']);
    }

    public function test_api_jugadoras_store_unauthorized()
    {
        $response = $this->postJson('/api/jugadores', []);
        $response->assertStatus(401); // No autenticado
    }

    public function test_api_jugadoras_store_forbidden_for_non_admin()
    {
        // Usuario normal (no admin)
        $user = User::factory()->create(['role' => 'user']);
        $equip = Equip::first();

        $data = [
            'nom' => 'Intruder',
            'equip_id' => $equip->id
        ];

        $response = $this->actingAs($user, 'sanctum')
                         ->postJson('/api/jugadores', $data);

        $response->assertStatus(403);
    }

    public function test_api_jugadoras_update_admin()
    {
        $user = User::factory()->create(['role' => 'administrador']);
        $jugadora = Jugadora::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
                         ->putJson("/api/jugadores/{$jugadora->id}", [
                             'nom' => 'Nom Canviat',
                             'equip_id' => $jugadora->equip_id
                         ]);

        $response->assertStatus(200)
                 ->assertJsonPath('data.nom', 'Nom Canviat');
    }

    public function test_api_jugadoras_delete_admin()
    {
        $user = User::factory()->create(['role' => 'administrador']);
        $jugadora = Jugadora::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
                         ->deleteJson("/api/jugadores/{$jugadora->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('jugadoras', ['id' => $jugadora->id]);
    }
}
