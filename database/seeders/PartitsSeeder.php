<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partit;
use App\Models\Equip;
use App\Models\Estadi;

class PartitsSeeder extends Seeder
{
    public function run(): void
    {
        // Obtenemos los equipos y estadios para poder usarlos
        $equips = Equip::all();
        $estadis = Estadi::all();

        // Verificamos que tengamos al menos 2 equipos y 1 estadio
        if ($equips->count() >= 2 && $estadis->count() > 0) {
            
            // Partido 1: Jornada 1
            Partit::create([
                'local_id' => $equips[0]->id,
                'visitant_id' => $equips[1]->id,
                'estadi_id' => $equips[0]->estadi_id ?? $estadis->first()->id,
                'data' => '2025-01-15',
                'jornada' => 1,
                'gols' => '2 - 1',
            ]);

            // Partido 2: Jornada 1
            if ($equips->count() >= 4) {
                Partit::create([
                    'local_id' => $equips[2]->id,
                    'visitant_id' => $equips[3]->id,
                    'estadi_id' => $equips[2]->estadi_id ?? $estadis->first()->id,
                    'data' => '2025-01-16',
                    'jornada' => 1,
                    'gols' => '0 - 0',
                ]);
            }

            // Partido 3: Jornada 2
            Partit::create([
                'local_id' => $equips[1]->id,
                'visitant_id' => $equips[0]->id,
                'estadi_id' => $equips[1]->estadi_id ?? $estadis->first()->id,
                'data' => '2025-01-22',
                'jornada' => 2,
                'gols' => '1 - 3',
            ]);

            // Añade más aquí si quieres...
        }
    }
}