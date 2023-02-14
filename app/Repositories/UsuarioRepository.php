<?php


namespace App\Repositories;

use App\Models\User;
use App\Repositories\AbstractRepository;

class UsuarioRepository extends AbstractRepository
{
    public function __construct(User $usuario)
    {
        $this->model = $usuario;
    }
}
