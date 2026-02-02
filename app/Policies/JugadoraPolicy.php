<?php

namespace App\Policies;

use App\Models\Jugadora;
use App\Models\User;

class JugadoraPolicy
{
    private function isAdmin(User $user): bool
    {
        // Adjust this logic based on your User model. Assuming 'role' attribute.
        // If role doesn't exist, this might need adjustment, but request said to use 'role' or similar.
        // Annex said: return ($user->role ?? null) === 'administrador';
        return ($user->role ?? null) === 'administrador';
    }

    // Lectura pública (return true) o protegida según config
    public function viewAny(?User $user = null): bool { return true; }
    public function view(?User $user = null, ?Jugadora $jugadora = null): bool { return true; }

    // Escriptura només admin
    public function create(User $user): bool { return $this->isAdmin($user); }
    public function update(User $user, Jugadora $jugadora): bool { return $this->isAdmin($user); }
    public function delete(User $user, Jugadora $jugadora): bool { return $this->isAdmin($user); }

    public function restore(User $user, Jugadora $jugadora): bool { return $this->isAdmin($user); }
    public function forceDelete(User $user, Jugadora $jugadora): bool { return $this->isAdmin($user); }
}
