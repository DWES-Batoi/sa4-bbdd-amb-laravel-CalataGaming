<?php

namespace App\Services;

use App\Models\Equip;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile; // Importante para manejar archivos
use Illuminate\Support\Facades\Storage; // Importante para borrar archivos

class EquipService {
    public function __construct(private BaseRepository $repo) {}

    public function llistar() {
        return $this->repo->getAll();
    }

    public function trobar($id){
        return $this->repo->find($id);
    }

    // Modificado para aceptar el archivo del escudo
    public function guardar(array $data, ?UploadedFile $escut = null) {
        if ($escut) {
            // Guarda el archivo en storage/app/public/escuts
            $data['escut'] = $escut->store('escuts', 'public');
        }
        return $this->repo->create($data);
    }

    // Modificado para gestionar el cambio de imagen y borrar la antigua
    public function actualitzar($id, array $data, ?UploadedFile $escut = null) {
        $equip = $this->repo->find($id);

        if ($escut) {
            // Si ya tenía un escudo, lo borramos del disco para no acumular basura
            if ($equip->escut) {
                Storage::disk('public')->delete($equip->escut);
            }
            // Guardamos el nuevo
            $data['escut'] = $escut->store('escuts', 'public');
        }

        return $this->repo->update($id, $data);
    }

    // Modificado para borrar la imagen cuando se elimina el equipo
    public function eliminar($id) {
        $equip = $this->repo->find($id);

        if ($equip->escut) {
            Storage::disk('public')->delete($equip->escut);
        }

        return $this->repo->delete($id);
    }
}