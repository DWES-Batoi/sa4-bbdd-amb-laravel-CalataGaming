namespace App\Services;

use App\Repositories\JugadoraRepository;

class JugadoraService {
    // Aquí podrías inyectar la interfaz si quieres ser 100% estricto
    public function __construct(private JugadoraRepository $repo) {}

    public function llistar() { return $this->repo->getAll(); }
    public function guardar(array $data) { return $this->repo->create($data); }
    // ... resto de métodos
}