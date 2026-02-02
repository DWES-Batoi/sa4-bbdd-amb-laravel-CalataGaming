<?php

namespace App\Policies;

use App\Models\Estadi;
use App\Models\User;

class EstadiPolicy
{
    private function isAdmin(User $user): bool
    {
        return ($user->role ?? null) === 'administrador';
    }

    public function viewAny(?User $user = null): bool { return true; }
    public function view(?User $user = null, ?Estadi $estadi = null): bool { return true; }
    public function create(User $user): bool { return $this->isAdmin($user); }
    public function update(User $user, Estadi $estadi): bool { return $this->isAdmin($user); }
    public function delete(User $user, Estadi $estadi): bool { return $this->isAdmin($user); }
}
