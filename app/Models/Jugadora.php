<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadora extends Model
{
    use HasFactory;

    // Important: tots els camps que demanes han d'estar aquí
    protected $fillable = ['nom', 'equip_id', 'posicio', 'dorsal', 'edat'];

    public function equip()
    {
        return $this->belongsTo(Equip::class);
    }
}