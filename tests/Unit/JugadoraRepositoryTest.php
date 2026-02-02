<?php

namespace Tests\Unit;

use App\Models\Jugadora;
use App\Models\Equip;
use App\Models\Estadi;
use App\Repositories\JugadoraRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JugadoraRepositoryTest extends TestCase
{
    use RefreshDatabase; // Esto limpia la BD en cada test

    protected JugadoraRepository $repo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repo = new JugadoraRepository();
    }

    public function test_crear_y_encontrar_jugadora()
    {
        // 1. Necesitamos un Estadi y un Equip porque Jugadora depende de ellos
        $estadi = Estadi::factory()->create();
        $equip = Equip::factory()->create(['estadi_id' => $estadi->id]);

        // 2. Datos de la jugadora
        $data = [
            'nom'            => 'Alexia Putellas',
            'equip_id'       => $equip->id,
            'data_naixement' => '1994-02-04',
            'dorsal'         => 11,
            'foto'           => 'alexia.jpg'
        ];

        // 3. Actuar: Crear usando el repositorio
        $jugadora = $this->repo->create($data);

        // 4. Asertar: ¿Está en la base de datos?
        $this->assertDatabaseHas('jugadoras', ['nom' => 'Alexia Putellas']);
        $this->assertEquals(11, $this->repo->find($jugadora->id)->dorsal);
        $this->assertEquals($equip->id, $jugadora->equip_id);
    }

    public function test_eliminar_jugadora()
    {
        $estadi = Estadi::factory()->create();
        $equip = Equip::factory()->create(['estadi_id' => $estadi->id]);
        $jugadora = Jugadora::factory()->create(['equip_id' => $equip->id]);

        $this->repo->delete($jugadora->id);

        $this->assertDatabaseMissing('jugadoras', ['id' => $jugadora->id]);
    }
}