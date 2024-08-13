<?php

namespace App\Repositories\Contracts;

use App\DTOs\StoreEstrategiaWmsParams;

interface EstrategiaWmsHorarioPrioridadeRepositoryInterface
{
    /**
     * Busca a prioridade com base na hora e minuto informados
     *
     * @param integer $cdEstrategia
     * @param string $hora
     * @return Object|null
     */
    public function findByHora(int $cdEstrategia, string $hora): ?Object;
}