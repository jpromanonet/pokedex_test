<?php
/**Los repositorios son clases o componentes que requieren o ejecutan la lógica necesaria para acceder a la capa de datos. */

namespace App\Repositories;

interface Repository
{
    public function all();
}
