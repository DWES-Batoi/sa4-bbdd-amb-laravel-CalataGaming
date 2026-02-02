<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jugadora;
use App\Models\Equip;

class JugadorasSeeder extends Seeder
{
    public function run(): void
    {
        // Agafem tots els equips per poder repartir les jugadores
        $equips = Equip::all();

        if ($equips->count() > 0) {
            // Jugadora 1
            Jugadora::create([
                'nom'            => 'Alexia Putellas',
                'equip_id'       => $equips->first()->id, // Relació amb l'equip
                'data_naixement' => '1994-02-04',        // Camp important
                'dorsal'         => 11,                  // Camp important
                'foto'           => 'alexia.jpg',        // Camp important (nom del fitxer)
            ]);

            // Jugadora 2
            Jugadora::create([
                'nom'            => 'Aitana Bonmatí',
                'equip_id'       => $equips->first()->id,
                'data_naixement' => '1998-01-18',
                'dorsal'         => 14,
                'foto'           => 'aitana.jpg',
            ]);

            // Jugadora 3 (en un altre equip si n'hi ha més d'un)
            $altreEquip = $equips->skip(1)->first() ?? $equips->first();
            Jugadora::create([
                'nom'            => 'Caroline Graham Hansen',
                'equip_id'       => $altreEquip->id,
                'data_naixement' => '1995-02-18',
                'dorsal'         => 10,
                'foto'           => null, // També pot ser null si no hi ha foto
            ]);
        }
    }
}